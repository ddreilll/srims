<div class="fv-row {{ isset($class) ? $class : '' }}" data-kt-password-meter="{{ $passwordMeter }}">
    <div class="mb-1">

        <div class="position-relative mb-3">
            <input class="form-control bg-transparent {{ $errors->has($name) ? ' is-invalid' : '' }}" type="password"
                @if(isset($placeholder))placeholder="{{ $placeholder }}"@endif name="{{ $name }}" autocomplete="off" />

            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                data-kt-password-meter-control="visibility">

                <i class="d-none"><i class="fa-duotone fa-eye"></i></i>
                <i><i class="fa-duotone fa-eye-slash "></i></i>
            </span>
        </div>
        @if ($passwordMeter == 'true')
            <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
            </div>
        @endif
    </div>

    @if ($passwordMeter == 'true')
        <div class="text-muted">
            <p class="mb-1">{{ sprintf('Use %s or more characters and must have:', config('panel.password.min')) }}
            </p>
            <ul>
                @if (config('panel.password.lowercase') == 'on')
                    <li>{{ __('at least one lowercase letter') }}</li>
                @endif
                @if (config('panel.password.uppercase') == 'on')
                    <li>{{ __('at least one uppercase letter') }}</li>
                @endif
                @if (config('panel.password.digits') == 'on')
                    <li>{{ __('at least one number from 0-9') }}</li>
                @endif
                @if (config('panel.password.special') == 'on')
                    <li>{{ __('at least one special character ex.: [@$!%*#?&]') }}</li>
                @endif
            </ul>
        </div>
    @endif

    @if ($errors->has($name))
        <div class="invalid-feedback d-block">
            @if (sizeOf($errors->get($name)) == 1)
                {{ $errors->first($name) }}
            @else
                <ul>
                    @foreach ($errors->get($name) as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
</div>
