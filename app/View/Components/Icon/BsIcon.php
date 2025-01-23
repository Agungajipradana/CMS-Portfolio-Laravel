<?php
// Declare the namespace for the BsIcon component.
namespace App\View\Components\Icon;

// Import necessary classes for the component.
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

// Define the BsIcon class, which is a Blade component.
class BsIcon extends Component
{
    // The class constructor with a public property for the icon name.
    public function __construct(
        public string $name // This property holds the name of the icon to render.
    ) {
        // Constructor body left intentionally blank (can be used for initialization if needed).
    }

    // Determine whether the component should render based on its properties.
    public function shouldRender(): bool
    {
        // Check if the 'name' property is set; if not, the component will not render.
        return isset($this->name);
    }

    // Render the component view.
    public function render(): View|Closure|string
    {
        // Return the Blade view for the BsIcon component.
        return view('components.icon.bs-icon');
    }
}
