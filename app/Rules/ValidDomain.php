<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidDomain implements ValidationRule
{
    private $validDomains;

    public function __construct(array $validDomains)
    {
        $this->validDomains = $validDomains;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Extract the domain from the email address
        if (sizeOf($this->validDomains) >= 1) {
            $domain = strtolower(substr(strrchr($value, "@"), 1));

            if (!in_array($domain, $this->validDomains)) {
                $fail('The associated :attribute domain is curently not permitted for access.');
            }
        }
    }
}
