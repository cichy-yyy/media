<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddJournalistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'imie' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/'],
            'nazwisko' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/'],
            'stanowisko' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/','nullable'],
            'region' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/','nullable'],
            'opiekun' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/','nullable'],
            'telefon1' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .\:\/]+$/','nullable'],
            'telefon2' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/','nullable'],
            'email1' => ['email','nullable'],
            'email2' => ['email','nullable'],
            'email3' => ['email','nullable'],
            'checklist' => ['nullable'],
            'informacje' => ['not_regex:/<|>/','nullable'],
            'id' => ['integer']
        ];
    }

    public function messages()
    {
        return [
            'imie.regex' => 'Popraw pole: imię. Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'nazwisko.regex' => 'Popraw pole: nazwisko. Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'stanowisko.regex' => 'Popraw pole: stanowisko. Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'region.regex' => 'Popraw pole: region. Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'opiekun.regex' => 'Popraw pole: opiekun. Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'strona.regex' => 'Proszę wprowadzić właściwy format strony internetowej',
            'telefon1.regex' => 'Popraw pole: telefon nr 1. Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'telefon2.regex' => 'Popraw pole: telefon nr 2. Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'email1.regex' => 'Proszę wprowadzić poprawny adres e-mail 1.',
            'email2.regex' => 'Proszę wprowadzić poprawny adres e-mail 2.',
            'email3.regex' => 'Proszę wprowadzić poprawny adres e-mail 3.',
            'checklist.regex' => 'Popraw pole: media. Dozwolone znaki to duże i małe litery oraz cyfry.',
            'informacje.not_regex' => 'Znaki: <> są niedozwolone.',
        ];
    }
}
