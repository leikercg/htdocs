<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            'title' => 'Beekeeper: El protector',
            'release_date' => '2024-01-12',
            'duration' => '1h 45m',
            'image' => 'bHZQYKJV1rV01S3kNZ3hEYz8VNM.jpg',
            'synopsis' => 'La brutal campaña de venganza de Adam Clay adquiere tintes nacionales tras revelarse que es un antiguo agente de una poderosa organización clandestina conocida como "Beekeeper".',
            'genre_id' => '1',
            'director_id' => '1',
            'lead_actor_id' => '1',
        ]);
        DB::table('movies')->insert([
            'title' => 'Cazadores en tierra inhóspita',
            'release_date' => '2024-01-25',
            'duration' => '1h 47m',
            'image' => 'jPGbcbMlzGUECukPhkEMVt1Kvs5.jpg',
            'synopsis' => 'Después de un terremoto que convierte Seúl en una tierra inhóspita y sin ley, un cazador entra en acción para rescatar a una chica en manos de un médico trastornado. Secuela del film de 2023 “Concrete Utopia”',
            'genre_id' => '1',
            'director_id' => '2',
            'lead_actor_id' => '2',
        ]);
        DB::table('movies')->insert([
            'title' => 'The Marvels',
            'release_date' => '2023-11-9',
            'duration' => '1h 45m',
            'image' => 'vpuuFM032yiX8tox4L84Wl9MGjG.jpg',
            'synopsis' => 'Cuando sus obligaciones la envían a un agujero de gusano vinculado a un revolucionario kree, los poderes de Carol Danvers, la capitana Marvel, se entremezclan con los de Kamala Khan, también conocida como la Sra. Marvel y la sobrina de Carol, ahora astronauta de S.A.B.E.R., Monica Rambeau. Juntas, deberán salvar el universo como "The Marvels".',
            'genre_id' => '4',
            'director_id' => '3',
            'lead_actor_id' => '3',
        ]);
        DB::table('movies')->insert([
            'title' => 'Los Juegos del Hambre: Balada de pájaros cantores y serpientes',
            'release_date' => '2023-11-17',
            'duration' => '2h 37m',
            'image' => 'z9oNYBLNa6f4MyLIkihlDSi1hxe.jpg',
            'synopsis' => 'Ambientada en un Panem postapocalíptico, nos hace retroceder varias décadas antes del comienzo de las aventuras de Katniss Everdeen. El joven Coriolanus Snow será el mentor de Lucy Gray Baird, la niña seleccionada como tributo del empobrecido Distrito 12. La joven sorprenderá a todos al cantar en la ceremonia de inauguración de los Décimos Juegos del Hambre en los que Snow intentará aprovecharse de su talento y encanto para sobrevivir.',
            'genre_id' => '6',
            'director_id' => '4',
            'lead_actor_id' => '4',
        ]);
        DB::table('movies')->insert([
            'title' => 'El aprendiz de tigre',
            'release_date' => '2024-02-2',
            'duration' => '1h 24m',
            'image' => '6AgafVcJ03sbxpOebGDGwsZWT9R.jpg',
            'synopsis' => "Película de animación que adapta la serie de novelas de fantasía tituladas The Tiger's Apprentice, del escritor Laurence Yep. La historia sigue a un niño que se convierte en el aprendiz mágico del Sr. Hu, un tigre que habla y que es el último de una larga lista de guardianes, cuyo trabajo es proteger al antiguo Fénix de Vatten de aquellos malhechores que desean usar sus poderes para hacer el mal. En su tarea descubrirán la importancia de la lealtad, el deber y la valentía.",
            'genre_id' => '3',
            'director_id' => '5',
            'lead_actor_id' => '5',
        ]);
        DB::table('movies')->insert([
            'title' => 'The Painter',
            'release_date' => '2024-01-5',
            'duration' => '1h 40m',
            'image' => 'UZ0ydgbXtnrq8xZCI5lHVXVcH9.jpg',
            'synopsis' => 'An ex-CIA operative is thrown back into a dangerous world when a mysterious woman from his past resurfaces. Now exposed and targeted by a relentless killer and a rogue black ops program, he must rely on skills he thought he left behind in a high-stakes game of survival.',
            'genre_id' => '1',
            'director_id' => '6',
            'lead_actor_id' => '6',
        ]);
        DB::table('movies')->insert([
            'title' => 'Juego de roles',
            'release_date' => '2024-01-12',
            'duration' => '1h 41m',
            'image' => 'bnG0VwIw9oBFVn58Z9cixVLsn93.jpg',
            'synopsis' => 'La historia gira en torno a una pareja casada (Cuoco y Oyelowo) cuyas vidas se ponen del revés cuando salen a la luz ciertos secretos del pasado. Emma tiene un marido maravilloso y dos hijos en los suburbios de Nueva Jersey; también tiene una vida secreta como asesina a sueldo, un secreto que su marido David descubre cuando la pareja decide darle vida a su matrimonio con un pequeño juego de roles.',
            'genre_id' => '9',
            'director_id' => '7',
            'lead_actor_id' => '7',
        ]);
        DB::table('movies')->insert([
            'title' => 'Con todos menos contigo',
            'release_date' => '2024-01-19',
            'duration' => '1h 44m',
            'image' => '3ltpe5KJt8c8hxHiF2u4jCinD4U.jpg',
            'synopsis' => 'Después de una primera cita increíble, la ardiente atracción entre ambos se enfría. Parecían la pareja perfecta, pero algo sucede y la cosa no va a más. Hasta que se reencuentran inesperadamente en una boda en Australia. Allí hacen lo que haría cualquier adulto: fingir que son una pareja.',
            'genre_id' => '5',
            'director_id' => '8',
            'lead_actor_id' => '8',
        ]);
        DB::table('movies')->insert([
            'title' => 'Napoleón',
            'release_date' => '2023-11-24',
            'duration' => '2h 38m',
            'image' => 're6SSQS1HgBGG9AMiNuPGISOfMx.jpg',
            'synopsis' => 'Una mirada personal a los orígenes del líder militar francés y su rápido y despiadado ascenso a emperador. La historia se ve a través de la lente de la relación adictiva y volátil de Napoleón Bonaparte con su esposa y único amor verdadero, Josefina.',
            'genre_id' => '8',
            'director_id' => '9',
            'lead_actor_id' => '9',
        ]);
        DB::table('movies')->insert([
            'title' => 'Plan en familia',
            'release_date' => '2023-12-15',
            'duration' => '1h 58m',
            'image' => 'j1hE9OUwDvYnZRCoOHWl3uURRI5.jpg',
            'synopsis' => 'Dan Morgan es muchas cosas: un marido devoto, un padre cariñoso, un reputado vendedor de coches. También es un exasesino. Y, cuando su pasado alcanza su presente, se ve obligado a embarcar a su ingenua familia en un viaje por carretera sin igual.',
            'genre_id' => '5',
            'director_id' => '10',
            'lead_actor_id' => '10',
        ]);
        DB::table('movies')->insert([
            'title' => 'Borderlands',
            'release_date' => '2024-8-9',
            'duration' => '',
            'image' => 'qXpQBgsasf60CBkevYJReZzbkDU.jpg',
            'synopsis' => 'Borderlands se desarrolla en el planeta Pandora. Atraídas por las aparentemente vastos yacimientos minerales, muchas naves colonizadores de la Dahl Corporation (una de las muchas diversas megacorporaciones que aparentemente controlan y gobiernan planetas enteros) viajan al planeta para construir asentamientos. Las operaciones de minería son llevadas a cabo por una cantidad enorme de convictos llevados al planeta por la propia corporación.',
            'genre_id' => '3',
            'director_id' => '11',
            'lead_actor_id' => '11',
        ]);
        DB::table('movies')->insert([
            'title' => 'This Place',
            'release_date' => '2024-8-4',
            'duration' => '',
            'image' => 'aBJxFc0K7mH2ZGxARM9LCmMTGTP.jpg',
            'synopsis' => 'An introspective journey of a Filipino son attending the funeral of his estranged OFW father in a city in Japan that is rebuilding from the aftermath of the March 2011 tsunami.',
            'genre_id' => '6',
            'director_id' => '12',
            'lead_actor_id' => '12',
        ]);
        DB::table('movies')->insert([
            'title' => 'Sovereign Waves',
            'release_date' => '2024-8-2',
            'duration' => '6m',
            'image' => 'j8ld2MZHN3eUt5S9H7kdL3m363X.jpg',
            'synopsis' => 'Experimental short film with some old video8 about the passage of time and how we perceive Memories',
            'genre_id' => '6',
            'director_id' => '13',
            'lead_actor_id' => '13',
        ]);
        DB::table('movies')->insert([
            'title' => "My Hero Academia: You're Next",
            'release_date' => '2024-8-2',
            'duration' => '',
            'image' => 'fLvGJWjWrKxxBzTesJuVniVK9uH.jpg',
            'synopsis' => '-',
            'genre_id' => '3',
            'director_id' => '14',
            'lead_actor_id' => '14',
        ]);
        DB::table('movies')->insert([
            'title' => 'Deadpool 3',
            'release_date' => '2024-07-24',
            'duration' => '',
            'image' => '3e9RToA9tGMl1T994T9T8zLW3CU.jpg',
            'synopsis' => 'Tercera entrega del mercenario bocazas.',
            'genre_id' => '1',
            'director_id' => '15',
            'lead_actor_id' => '15',
        ]);
        DB::table('movies')->insert([
            'title' => 'Wonka',
            'release_date' => '2023-12-06',
            'duration' => '1h 57m',
            'image' => 'tFyQa5WQqldIL44HBLaCmn5eERD.jpg',
            'synopsis' => 'Basada en el personaje que protagoniza "Charlie y la fábrica de chocolate", el libro infantil más emblemático de Roald Dahl y uno de los más vendidos de todos los tiempos, "Wonka" cuenta la historia de cómo el mayor inventor, mago y chocolatero del mundo se convirtió en el querido Willy Wonka que conocemos hoy en día.',
            'genre_id' => '7',
            'director_id' => '16',
            'lead_actor_id' => '16',
        ]);
        DB::table('movies')->insert([
            'title' => 'Wish: El poder de los deseos',
            'release_date' => '2023-11-24',
            'duration' => '1h 35m',
            'image' => '1VXMrUioKfPAPSsezHKexx77Dbz.jpg',
            'synopsis' => 'Asha y una pequeña bola de energía ilimitada llamada Star demuestran que cuando la voluntad de un ser humano valiente se conecta con la magia de las estrellas, pueden suceder cosas maravillosas.',
            'genre_id' => '7',
            'director_id' => '17',
            'lead_actor_id' => '17',
        ]);
        DB::table('movies')->insert([
            'title' => 'Migración: un viaje patas arriba',
            'release_date' => '2023-12-22',
            'duration' => '1h 23m',
            'image' => 'brAqSBoSXzxEYV6rGYwbRvhlXCE.jpg',
            'synopsis' => 'Una familia de patos intenta convencer a su sobreprotector padre para que se vayan a las vacaciones de su vida',
            'genre_id' => '2',
            'director_id' => '18',
            'lead_actor_id' => '18',
        ]);
        DB::table('movies')->insert([
            'title' => 'Rebel Moon (Parte uno): La niña del fuego',
            'release_date' => '2023-12-22',
            'duration' => '2h 14m',
            'image' => '2R7RUo3EGs3T3UdKPlfVQWkyUCD.jpg',
            'synopsis' => 'Cuando una pacífica colonia en los confines de la galaxia se ve amenazada por un poder tiránico, su mejor baza para sobrevivir es la misteriosa Kora. Esta reúne a un grupo dispuesto a luchar, formado por forasteros, insurgentes, campesinos y huérfanos de guerra de varios planetas unidos por una causa común: la redención y la venganza. Mientras la sombra de todo un reino se cierne sobre la más improbable de las lunas, se libra una batalla por el destino de una galaxia y se forja un nuevo ejército de héroes.',
            'genre_id' => '4',
            'director_id' => '19',
            'lead_actor_id' => '19',
        ]);
        DB::table('movies')->insert([
            'title' => 'Los Mercen4rios',
            'release_date' => '2023-9-29',
            'duration' => '1h 43m',
            'image' => '2jmE7xH0R0dikmc8iplCPCit4MD.jpg',
            'synopsis' => 'Cuarta entrega de la saga Los Mercenarios. El veterano mercenario Barney “Esquizo” Ross (Sylvester Stallone) y su equipo de estrellas, formado por los hombres más duros (Jason Statham, Dolph Lundgren, 50 Cent, Megan Fox…), afrontan un nuevo desafío, en una trama cargada de acción. Para superarlo y salir airosos, deberán recurrir a su ingenio, experiencia y a la fuerza bruta que los caracteriza.',
            'genre_id' => '1',
            'director_id' => '20',
            'lead_actor_id' => '20',
        ]);
        DB::table('movies')->insert([
            'title' => 'Oppenheimer',
            'release_date' => '2023-07-20',
            'duration' => '3h 1m',
            'image' => 'ncKCQVXgk4BcQV6XbvesgZ2zLvZ.jpg',
            'synopsis' => "Película sobre el físico J. Robert Oppenheimer y su papel como desarrollador de la bomba atómica. Basada en el libro 'American Prometheus: The Triumph and Tragedy of J. Robert Oppenheimer' de Kai Bird y Martin J. Sherwin.",
            'genre_id' => '6',
            'director_id' => '21',
            'lead_actor_id' => '21',
        ]);
        DB::table('movies')->insert([
            'title' => 'El chico y la garza',
            'release_date' => '2023-10-27',
            'duration' => '2h 4m',
            'image' => 'kUT2nTjJfccfmpoOG4sUWmHyCZY.jpg',
            'synopsis' => 'La película muestra el crecimiento psicológico de un adolescente a través de interacciones con sus amigos y su tío. Está basada en el libro de 1937 del mismo nombre escrito por Genzaburo Yoshino.',
            'genre_id' => '3',
            'director_id' => '22',
            'lead_actor_id' => '22',
        ]);
        DB::table('movies')->insert([
            'title' => 'Pobres criaturas',
            'release_date' => '2024-01-26',
            'duration' => '2h 21m',
            'image' => 'xbfzQ7Q7qmDUf50eZH8C57Ygx6n.jpg',
            'synopsis' => 'Bella Baxter es una joven revivida por el brillante y poco ortodoxo científico Dr. Godwin Baxter. Bajo la protección de Baxter, Bella está ansiosa por aprender. Hambrienta de la mundanidad que le falta, Bella se escapa con Duncan Wedderburn, un sofisticado y perverso abogado, en una aventura vertiginosa a través de los continentes. Libre de los prejuicios de su época, Bella se vuelve firme en su propósito de defender la igualdad y la liberación.',
            'genre_id' => '9',
            'director_id' => '23',
            'lead_actor_id' => '23',
        ]);
        DB::table('movies')->insert([
            'title' => 'La sociedad de la nieve',
            'release_date' => '2023-12-15',
            'duration' => '2h 23m',
            'image' => 'zBW3eu851EBSw9GinzRfYXeNI9e.jpg',
            'synopsis' => 'El 13 de octubre de 1972, el vuelo 571 de la Fuerza Aérea Uruguaya, fletado para llevar a un equipo de rugby a Chile, se estrella en un glaciar en el corazón de los Andes.',
            'genre_id' => '6',
            'director_id' => '24',
            'lead_actor_id' => '24',
        ]);
        DB::table('movies')->insert([
            'title' => 'The Creator',
            'release_date' => '2023-9-29',
            'duration' => '2h 13m',
            'image' => 'xddifbxtO46XClG8wdyUySUqJA4.jpg',
            'synopsis' => 'En medio de una guerra futura entre la raza humana y las fuerzas de la inteligencia artificial, Joshua, un duro ex-agente de las fuerzas especiales que llora la desaparición de su esposa, es reclutado para cazar y matar al Creador, el escurridizo arquitecto de la IA avanzada que ha desarrollado una misteriosa arma con el poder de acabar con la guerra... y con la propia humanidad.',
            'genre_id' => '3',
            'director_id' => '25',
            'lead_actor_id' => '25',
        ]);
        DB::table('movies')->insert([
            'title' => 'La maldición de Hannah Stevenson',
            'release_date' => '2022-03-14',
            'duration' => '1h 15m',
            'image' => 'so05qY0sDY0348bRg0tK9tSnnEq.jpg',
            'synopsis' => 'Hannah y Matt, una joven pareja en sus primeras vacaciones juntos, pronto descubren que es posible que no se vean cara a cara. Sintiéndose como si hubiera defraudado a su novio, Hannah solicita la ayuda de una misteriosa mujer gitana, con la esperanza de que los problemas de la pareja puedan superarse. Sin embargo, cuando Matt se despierta y descubre que su novia ha desaparecido, las siniestras intenciones de la mujer gitana se vuelven demasiado claras.',
            'genre_id' => '10',
            'director_id' => '26',
            'lead_actor_id' => '26',
        ]);
        DB::table('movies')->insert([
            'title' => 'Transformers: El despertar de las bestias',
            'release_date' => '2023-6-9',
            'duration' => '2h 7m',
            'image' => '8HBYMQkF6cFpupgRDhsrrKskXOE.jpg',
            'synopsis' => 'Cuando surge una nueva amenaza capaz de destruir todo el planeta, Optimus Prime y los Autobots deben unirse a una poderosa facción conocida como los Maximals. Con el destino de la humanidad en juego, los humanos Noah y Elena harán lo que sea necesario para ayudar a los Transformers mientras se involucran en la batalla final para salvar la Tierra.',
            'genre_id' => '4',
            'director_id' => '27',
            'lead_actor_id' => '27',
        ]);
        DB::table('movies')->insert([
            'title' => 'Fast & Furious X',
            'release_date' => '2023-05-19',
            'duration' => '2h 21m',
            'image' => 'x3zlm6VxPvVrYWE3bHkYUQMR798.jpg',
            'synopsis' => 'Durante numerosas misiones más que imposibles, Dom Toretto y su familia han sido capaces de ser más listos, de tener más valor y de ir más rápido que cualquier enemigo que se cruzara con ellos. Pero ahora tendrán que enfrentarse al oponente más letal que jamás hayan conocido: Un terrible peligro que resurge del pasado, que se mueve por una sangrienta sed de venganza y que está dispuesto a destrozar a la familia y destruir para siempre todo lo que a Dom le importa.',
            'genre_id' => '1',
            'director_id' => '28',
            'lead_actor_id' => '28',
        ]);
        DB::table('movies')->insert([
            'title' => 'The Equalizer 3',
            'release_date' => '2023-9-1',
            'duration' => '1h 49m',
            'image' => 'eJKmexmCLwuxOxlAURSMnBVkfmY.jpg',
            'synopsis' => 'Desde que renunció a su vida como asesino del gobierno, Robert McCall (Denzel Washington) ha luchado para reconciliarse con las cosas horribles que ha hecho en el pasado y encuentra un extraño consuelo en hacer justicia en nombre de los oprimidos. Mientras se encuentra en su casa en el sur de Italia, descubre que sus nuevos amigos están bajo el control de los jefes del crimen local. A medida que los acontecimientos comienzan a complicarse, McCall entiende lo que tiene que hacer: convertirse en el protector de sus amigos enfrentándose a la temida mafia.',
            'genre_id' => '1',
            'director_id' => '29',
            'lead_actor_id' => '29',
        ]);
        DB::table('movies')->insert([
            'title' => 'Los segundones',
            'release_date' => '2024-01-25',
            'duration' => '1h 36m',
            'image' => '3wu1W6bvNGPm2AvVDP7dkGYF8pd.jpg',
            'synopsis' => 'Jaycen Jenning, una antigua superestrella de la NFL que, tras un encontronazo con la ley, acepta entrenar a un equipo de fútbol juvenil en lugar de ir a la cárcel con la esperanza de relanzar su incipiente carrera.',
            'genre_id' => '5',
            'director_id' => '30',
            'lead_actor_id' => '30',
        ]);
        DB::table('movies')->insert([
            'title' => 'John Wick 4',
            'release_date' => '2023-03-24',
            'duration' => '2h 50m',
            'image' => 'gh2bmprLtUQ8oXCSluzfqaicyrm.jpg',
            'synopsis' => 'John Wick descubre un camino para derrotar a la Alta Mesa. Pero para poder ganar su libertad, Wick deberá enfrentarse a un nuevo rival con poderosas alianzas en todo el mundo, capaz de convertir a viejos amigos en enemigos.',
            'genre_id' => '1',
            'director_id' => '31',
            'lead_actor_id' => '31',
        ]);
        DB::table('movies')->insert([
            'title' => 'Megalodón 2: La fosa',
            'release_date' => '2023-8-4',
            'duration' => '1h 56m',
            'image' => 'mBgynPDplmo5JTY9VfGqY35OjDu.jpg',
            'synopsis' => "Una exploración submarina en las profundidades del océano se convierte en una espiral de caos cuando una malévola operación minera amenaza la misión y obliga al equipo de investigación a librar una arriesgada batalla por la supervivencia. Secuela de 'The Meg' (2018).",
            'genre_id' => '10',
            'director_id' => '32',
            'lead_actor_id' => '32',
        ]);
        DB::table('movies')->insert([
            'title' => 'Avatar: El sentido del agua',
            'release_date' => '2022-12-16',
            'duration' => '3h 12m',
            'image' => 'ckeTumMS4G31UQ9NNkmtW2QhfMF.jpg',
            'synopsis' => "Más de una década después de los acontecimientos de 'Avatar', los Na'vi Jake Sully, Neytiri y sus hijos viven en paz en los bosques de Pandora hasta que regresan los hombres del cielo. Entonces comienzan los problemas que persiguen sin descanso a la familia Sully, que decide hacer un gran sacrificio para mantener a su pueblo a salvo y seguir ellos con vida.",
            'genre_id' => '4',
            'director_id' => '33',
            'lead_actor_id' => '33',
        ]);
    }
}
