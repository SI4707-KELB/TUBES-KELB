<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'email' => $this->normalizeEmail($this->input('email')),
            'phone_number' => $this->normalizePhoneNumber($this->input('phone_number')),
        ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => ['nullable', 'email', 'max:255', 'required_without:phone_number'],
            'phone_number' => ['nullable', 'string', 'max:20', 'regex:/^\+?[0-9]{8,15}$/', 'required_without:email'],
            'password' => ['required', 'string'],
        ];
    }

    private function normalizeEmail(mixed $value): mixed
    {
        if (! is_string($value)) {
            return $value;
        }

        $value = strtolower(trim($value));

        return $value === '' ? null : $value;
    }

    private function normalizePhoneNumber(mixed $value): mixed
    {
        if (! is_string($value)) {
            return $value;
        }

        $value = trim($value);

        if ($value === '') {
            return null;
        }

        $prefix = str_starts_with($value, '+') ? '+' : '';
        $digits = preg_replace('/\D+/', '', $value) ?? '';

        return $digits === '' ? null : $prefix.$digits;
    }
}
