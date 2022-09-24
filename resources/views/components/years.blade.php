{{
  collect(array_reverse(range(1970, date('Y') + 1)))->map(function ($year) {
    return (string) $year;
  })->prepend('')->toJson()
}}
