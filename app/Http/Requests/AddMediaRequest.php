<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMediaRequest extends FormRequest
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
            'nazwa' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/'],
            'region' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/'],
            'miasto' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/','nullable'],
            'ulica' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/','nullable'],
            'kod_pocztowy' => ['regex:/^\d\d-\d\d\d$/','nullable'],
            'strona' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .\:\/]+$/','nullable'],
            'telefon1' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/','nullable'],
            'telefon2' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/','nullable'],
            'telefon3' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/','nullable'],
            //'informacje' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9-_ .]+$/','nullable'],
            'informacje' => ['not_regex:/<|>/','nullable'],
            'email' => ['email','nullable'],
            'email2' => ['email','nullable'],
            'email3' => ['email','nullable'],
            'email4' => ['email','nullable'],
            'opiekun' => ['regex:/^[a-zA-ZĄąółŁćĆźŹęĘśŚżŻ0-9]+$/'],
            'id' => ['integer']
        ];
    }

    public function messages()
    {
        return [
            'nazwa.regex' => 'Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'region.regex' => 'Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'miasto.regex' => 'Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'ulica.regex' => 'Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'kod_pocztowy.regex' => 'Kod pocztowy powinien mieć format: XX-XXX',
            'strona.regex' => 'Proszę wprowadzić właściwy format strony internetowej',
            'telefon1.regex' => 'Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'telefon2.regex' => 'Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'telefon3.regex' => 'Dozwolone znaki to: duże i małe litery, cyfry oraz -._',
            'informacje.not_regex' => 'Znaki: <> są niedozwolone.',
            'email.regex' => 'Proszę wprowadzić poprawny adres e-mail.',
            'email2.regex' => 'Proszę wprowadzić poprawny adres e-mail.',
            'email3.regex' => 'Proszę wprowadzić poprawny adres e-mail.',
            'email4.regex' => 'Proszę wprowadzić poprawny adres e-mail._',
            'opiekun.regex' => 'Dozwolone znaki to duże i małe litery oraz cyfry.'
        ];
    }
}
