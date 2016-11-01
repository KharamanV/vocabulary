<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HashAlgorithm;
use App\Models\Vocabulary;
use App\Models\User;
use App\Models\UserHash;
use App\Helpers\GeoHelper;
use App\Helpers\HashHelper;

class HashController extends Controller
{
    /**
     * Display a hashes and info of current user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $geoData = GeoHelper::getGeoData();
        $ip = $geoData->ip;

        if (!$user = User::ip($ip)->first()) {
            return redirect()->route('hash.create');
        }

        $hashes = UserHash::userId($user->id)->get();
        
        return view('hashes.index', ['user' => $user, 'hashes' => $hashes]);
    }

    /**
     * Show the form for creating a new hashes.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hashAlgorithms = HashAlgorithm::all();
        $vocabularies = Vocabulary::all();
        
        return view('hashes.create', ['algorithms' => $hashAlgorithms, 'vocabularies' => $vocabularies]);
    }

    /**
     * Store a newly created hashes in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'words'      => 'required|array',
            'algorithms' => 'required|array'
        ]);

        $geoData = GeoHelper::getGeoData();
        $ip = $geoData->ip;

        $userId = ($user = User::ip($ip)->first()) ? $user->id : $this->setUser($request, $geoData);

        $words = [];
        $algorithms = [];

        foreach ($request->words as $word) {
           $words[] = Vocabulary::id($word)->firstOrFail();
        }

        foreach ($request->algorithms as $algorithm) {
            $algorithms[] = HashAlgorithm::id($algorithm)->firstOrFail();
        }

        foreach ($algorithms as $algorithm) {
            $method = 'hashBy' . ucfirst($algorithm->name);

            foreach($words as $word) {
                $hashedWord =  HashHelper::$method($word);

                UserHash::insert([
                    'user_id' => $userId,
                    'hash_algorithm_id' => $algorithm->id,
                    'vocabulary_id' => $word->id,
                    'hash' => $hashedWord,
                    'created_at' => \Carbon\Carbon::now()
                ]);                
            }
        }  

        return redirect()->route('hash.index')->with('success', 'Success!');  
    }

    /**
     * Helper function, which converts array to XML
     *
     * @param \Illuminate\Http\Request  $request
     * @param array $geoData Geodata of current user
     * @return int Id of user
     */
    public function setUser($request, $geoData)
    {
        $user = new User;
        $user->ip = $geoData->ip;
        $user->browser = $request->header('User-Agent');
        $user->country = $geoData->country;
        $user->save();

        return $user->id;
    }
}
