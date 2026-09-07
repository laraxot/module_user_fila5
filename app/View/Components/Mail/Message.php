<?php

declare(strict_types=1);

namespace Modules\User\View\Components\Mail;

use Illuminate\Contracts\View\View;
<<<<<<< HEAD
<<<<<<< HEAD
use Closure;
=======
>>>>>>> 2024e2e7 (.)
=======
>>>>>>> f589f9b2 (.)
use Illuminate\View\Component;
use Modules\Xot\Datas\MetatagData;

class Message extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        // public string $message
    ) {}

    /**
     * Get the view / contents that represent the component.
<<<<<<< HEAD
<<<<<<< HEAD
     *
     * @return View|Closure|string
     */
    public function render()
=======
     */
    public function render(): View|\Closure|string
>>>>>>> 2024e2e7 (.)
=======
     */
    public function render(): View|\Closure|string
>>>>>>> f589f9b2 (.)
    {
        $metatag = MetatagData::make();
        $view = 'user::components.mail.html.message';
        $view_params = [
<<<<<<< HEAD
<<<<<<< HEAD
            'logo' => asset($metatag->getLogoHeader()),
=======
            'logo' => asset($metatag->getBrandLogo()),
>>>>>>> 2024e2e7 (.)
=======
            'logo' => asset($metatag->getBrandLogo()),
>>>>>>> f589f9b2 (.)
        ];

        return view($view, $view_params);
    }
}
