<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use App\Models\Design;
use App\Models\Pricing;
use App\Models\Logo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = auth('admin')->user();

            return $next($request);
        });
    }

    public function index()
    {


        $dataPlatforms = $this->getPlatforms();
      

        $maxPlatforms = count($dataPlatforms);
        $coverPlatforms_urls = [];
        for($i=0; $i<$maxPlatforms; $i++){
            $coverPlatforms=$dataPlatforms[$i]->getMedia('cover');
            if (isset($coverPlatforms[0])) {
                foreach ($coverPlatforms as $c) {
                    $url = $c->getUrl();
                    $coverPlatforms_urls[] = $url;
                }
            }
        }


        $dataDesigns = $this->getDesigns();
      

        $maxDesigns = count($dataDesigns);
        $coverDesigns_urls = [];
        for($i=0; $i<$maxDesigns; $i++){
            $coverDesigns=$dataDesigns[$i]->getMedia('cover');
            if (isset($coverDesigns[0])) {
                foreach ($coverDesigns as $c) {
                    $url = $c->getUrl();
                    $coverDesigns_urls[] = $url;
                }
            }
        }


        $dataPricing = $this->getPricing();
      

        $maxPricing = count($dataPricing);
        $coverPricing_urls = [];
        for($i=0; $i<$maxPricing; $i++){
            $coverPricing=$dataPricing[$i]->getMedia('cover');
            if (isset($coverPricing[0])) {
                foreach ($coverPricing as $c) {
                    $url = $c->getUrl();
                    $coverPricing_urls[] = $url;
                }
            }
        }

        $dataLogo = $this->getLogo();
        $coverLogo=$dataLogo->getMedia('cover');
        $coverLogo_url= $coverLogo[0]->getUrl();



        return view('index', [
            'dataPlatforms' => $dataPlatforms,
            'coverPlatforms_urls' => $coverPlatforms_urls,
            'dataDesigns' => $dataDesigns,
            'coverDesigns_urls' => $coverDesigns_urls,
            'dataPricing' => $dataPricing,
            'dataLogo' => $dataLogo,
            'coverLogo_url' => $coverLogo_url,
            'coverPricing_urls' => $coverPricing_urls,
        ]);
       
    }

   

    function getPlatforms()
    {
        $query = Platform::where('enabled', true);

        if (!$this->isAdmin()) {
            //$query->where('published_at', '<=', Carbon::now());
        }

        $query->orderBy('id', 'ASC');

        return $query->get();

      
       
    }

    function getDesigns()
    {
        $query = Design::where('enabled', true);

        if (!$this->isAdmin()) {
            //$query->where('published_at', '<=', Carbon::now());
        }

        $query->orderBy('id', 'ASC');

        return $query->get();

      
       
    }

    function getPricing()
    {
        $query = Pricing::where('enabled', true);

        if (!$this->isAdmin()) {
            //$query->where('published_at', '<=', Carbon::now());
        }
        

        $query->orderBy('id', 'ASC');

        return $query->get();

      
       
    }



    function getLogo()
    {
        $query = Logo::where('enabled', true);

        if (!$this->isAdmin()) {
            //$query->where('published_at', '<=', Carbon::now());
        }
        

        $query->orderBy('id', 'ASC');

        return $query->first();

      
       
    }



    

    function isAdmin(): bool
    {
        $admin = isset($this->user) ? $this->user->roles()->where('name', 'Administrator')->first() : null;

        return $admin != null;
    }

   

    
}