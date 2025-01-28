<?php
/**
* buscarYMostrarPokemon
* Esta función hace dos cosas principales:
* 1. Busca un Pokémon en la API de PokeAPI
* 2. Formatea los datos recibidos en HTML para mostrarlos
* 
* @param string $pokemon - El nombre o numero de pokedex del Pokémon que queremos buscar
* @return string - Devuelve HTML con los datos del Pokémon o un mensaje de error
*/
function buscarYMostrarPokemon($pokemon) {
   // Construimos la URL para la API
   // strtolower() convierte el nombre a minúsculas porque la API lo requiere
   $url = "https://pokeapi.co/api/v2/pokemon/" . strtolower($pokemon);
   
   // Intentamos obtener los datos de la API
   // El @ silencia los warnings si hay error
   $result = @file_get_contents($url);
   
   // Si no encontramos el Pokémon, devolvemos mensaje de error
   if ($result === false) {
       return '<tr><td colspan="6" class="mensajeError">El Pokémon no existe</td></tr>';
   }

   // Convertimos el JSON que nos da la API a un array  asociativo 
   $datos = json_decode($result, true);
   
   // Procesamos los tipos del Pokémon
   // Primer tipo (todos los Pokémon tienen al menos uno)
   $tipos = ucfirst($datos['types'][0]['type']['name']); // ucfirst pone la primera letra en mayúscula
   
   // Comprobamos si tiene un segundo tipo
   if (isset($datos['types'][1])) {
       $tipos .= " / " . ucfirst($datos['types'][1]['type']['name']);
   }
   
   // Devolvemos una fila de tabla HTML con todos los datos
   // La altura y peso se dividen entre 10 porque la API los da en decímetros y hectogramos
  
   
   return '<tr>
       <td><img src="' . $datos['sprites']['front_default'] . '" alt="' . $datos['name'] . '" class="pokemon-img"></td>
       <td>' . $datos['id'] . '</td>
       <td>' . ucfirst($datos['name']) . '</td>
       <td>' . $tipos . '</td>
       <td>' . ($datos['height'] / 10) . ' m</td>
       <td>' . ($datos['weight'] / 10) . ' kg</td>
   </tr>';
}
/**
 * Función que comprueba si se ha enviado el formulario
 * @return string HTML generado con los resultados
 */
function formularioSubmit() {
    if (isset($_GET['pokemon'])) {
        $pokemon = trim($_GET['pokemon']); // Limpia espacios
        return buscarYMostrarPokemon($pokemon);
    }
    return ''; // Retorna cadena vacía si no hay búsqueda
}



?>