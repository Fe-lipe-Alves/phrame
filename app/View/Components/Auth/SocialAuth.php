<?php

namespace App\View\Components\Auth;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SocialAuth extends Component
{
    public array $providers = [
        'google' => [
            'name' => 'Google',
            'image' => 'https://static.vecteezy.com/ti/vetor-gratis/p1/13948549-logotipo-do-google-em-fundo-branco-transparente-gratis-vetor.jpg',
            'route' => 'social.google',
        ],
        'facebook' => [
            'name' => 'Facebook',
            'image' => 'https://auth.services.adobe.com/img/social/f_logo_RGB-Blue_58.png',
            'route' => 'social.facebook',
        ],
        'microsoft' => [
            'name' => 'Microsoft',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTnrbPpgPDWrj1UhXhv96IJZNlwDLhq8wPeNw&usqp=CAU',
            'route' => 'social.microsoft',
        ],
    ];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.auth.social-auth');
    }
}
