<div
    class="alert bg-{{ isset($bgColor) ? $bgColor : 'dark' }} d-flex flex-column flex-sm-row p-5 mb-10 {{ isset($class) ? $class : '' }}">
    @if (!isset($hasIcon) || (isset($hasIcon) && $hasIcon == 'true'))
        <i
            class="fa-duotone {{ isset($icon) ? $icon : 'fa-message-bot' }} fs-2 text-{{ isset($textColor) ? $textColor : 'light' }} me-4 my-auto"></i>
    @endif
    <div class="d-flex flex-column text-{{ isset($textColor) ? $textColor : 'light' }} pe-0 pe-sm-10">
        @isset($title)
            <h4 class="mb-1 text-{{ isset($textColor) ? $textColor : 'light' }}">{{ $title }}</h4>
        @endisset

        {{ $message }}
    </div>
</div>
