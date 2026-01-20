<?php

declare(strict_types=1);

namespace Modules\User\View\Components\Mail;

use Illuminate\Contracts\View\View;
<<<<<<< HEAD
=======
use Closure;
>>>>>>> f548be94 (.)
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
     */
    public function render(): View|\Closure|string
=======
     *
     * @return View|Closure|string
     */
    public function render()
>>>>>>> f548be94 (.)
    {
        $metatag = MetatagData::make();
        $view = 'user::components.mail.html.message';
        $view_params = [
<<<<<<< HEAD
            'logo' => asset($metatag->getBrandLogo()),
=======
            'logo' => asset($metatag->getLogoHeader()),
>>>>>>> f548be94 (.)
        ];

        return view($view, $view_params);
    }
}
