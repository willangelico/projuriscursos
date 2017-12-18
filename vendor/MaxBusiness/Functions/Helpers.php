<?php

namespace MaxBusiness\Functions;

class Helpers
{
	public function generatePass()
	{
		// generate Pass with rich\phpass
	}

	public function checkArray ( $array, $key ) {
		// Verifica se a chave existe no array
		if ( isset( $array[ $key ] ) && ! empty( $array[ $key ] ) ) {
			// Retorna o valor da chave
			return $array[ $key ];
		}		
		// Retorna nulo por padrão
		return null;
	} // checkArray
}