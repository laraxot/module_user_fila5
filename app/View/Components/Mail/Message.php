<?php

declare(strict_types=1);

namespace Modules\User\View\Components\Mail;

use Illuminate\Contracts\View\View;
<<<<<<< HEAD
use Closure;
=======
>>>>>>> 2024e2e7 (.)
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
     *
     * @return View|Closure|string
     */
    public function render()
=======
     */
    public function render(): View|\Closure|string
>>>>>>> 2024e2e7 (.)
    {
        $metatag = MetatagData::make();
        $view = 'user::components.mail.html.message';
        $view_params = [
<<<<<<< HEAD
            'logo' => asset($metatag->getLogoHeader()),
=======
            'logo' => asset($metatag->getBrandLogo()),
>>>>>>> 2024e2e7 (.)
        ];

        return view($view, $view_params);
    }
}
