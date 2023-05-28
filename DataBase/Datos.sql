-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-05-2023 a las 16:52:51
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `MadoFit`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `id_ejercicio` int NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `grupo_muscular` varchar(50) DEFAULT NULL,
  `equipo_necesario` varchar(100) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_usuario` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`id_ejercicio`, `nombre`, `descripcion`, `grupo_muscular`, `equipo_necesario`, `imagen`, `id_usuario`) VALUES
(1, 'Press de banca con barra', 'Acostado en el banco, con los pies en el suelo. Agarra la barra con un agarre más amplio que el ancho de los hombros. Tus antebrazos deben estar perpendiculares al suelo.\r\n        Desengancha la barra y bájala lentamente hasta la parte inferior del pecho. A medida que contraes los pectorales, empuja la carga hacia arriba hasta que los brazos estén casi rectos.\r\n        \r\n        Durante todo el movimiento:\r\n        \r\n		1. Mantén los codos en el exterior para poner el máximo esfuerzo en el pecho y el mínimo en los deltoides anteriores y el tríceps.\r\n		2. Mantén los hombros apoyados en la banca.', 'Pectorales', 'Barra, banco', 'pressdebanca.jpg', NULL),
(2, 'Press banca inclinado con mancuernas', 'Tumbado en el banco inclinado, con los pies apoyados en el suelo, una mancuerna en cada mano, agarre en pronación. Sostén las mancuernas a cada lado a la altura del pecho. Tus antebrazos deben estar perpendiculares al suelo.\r\n        Mientras contraes tus pectorales, empuja la carga hacia arriba hasta que tus brazos estén casi rectos, luego vuelve a la posición inicial.\r\n        \r\n        Durante todo el movimiento:\r\n        \r\n        1. Mantén los codos hacia afuera para poner el máximo esfuerzo en los pectorales y el mínimo en los deltoides frontales y el tríceps.\r\n		2. Mantén los hombros pegados al banco.', 'Pectorales', 'Mancuernas, banco', 'pressdebancamancuerna.jpg', NULL),
(3, 'Aperturas en máquina Peck Deck o Contractora', 'Sentado en la máquina \"Peck deck\" con la espalda pegada al respaldo, los antebrazos bien apoyados contra las piezas acolchadas previstas para este fin. La parte superior de los brazos debe estar paralela al suelo y en línea con los hombros.\r\n        \r\n        Aprieta los brazos tanto como sea posible siguiendo el movimiento de la máquina. Contrae el pecho al final del movimiento y luego vuelve lentamente a la posición inicial.', 'Pectorales', 'Máquina Peck Deck', 'aperturasconmaquina.jpg', NULL),
(4, 'Cruce de poleas', 'Toma los manerales que están en los extremos de cada cable y colócate en el centro entre las poleas. Dobla el pecho ligeramente hacia adelante y mantén los codos ligeramente doblados.\r\n        \r\n        Aprieta lentamente los brazos frente al pecho como si fuera un arco. Mantén los codos ligeramente flexionados durante el movimiento. Cuando las manos se junten, mantén la posición por un momento, contrayendo el pecho. Luego vuelve lentamente a la posición original.', 'Pectorales', 'Máquina de poleas', 'CruceDePoleas.jpg', NULL),
(5, 'Press de banca inclinado con barra', 'Tumbado en un banco inclinado con los pies en el suelo. Toma la barra con un agarre más amplio que el ancho de los hombros. Tus antebrazos deben estar perpendiculares al suelo.\r\n        \r\n        Saca la barra y bájala lentamente hasta la parte superior de tu pecho. A medida que contraes los pectorales, empuja la carga hacia arriba hasta que los brazos estén casi rectos.\r\n        \r\n        Durante todo el movimiento:\r\n        \r\n       1. Mantén los codos hacia afuera para poner el máximo esfuerzo en el pecho y el mínimo en los deltoides frontales y el tríceps.\r\n       2. Mantén los hombros pegados al banco.', 'Pectorales', 'Barra, banco', 'pressdebancainclinado.jpg', NULL),
(6, 'Press de banca con mancuernas', 'Tumbado en el banco, con los pies en el suelo, una mancuerna en cada mano, agarre de pronación. Sostén las mancuernas a los lados a la altura del pecho. Los antebrazos deben estar perpendiculares al suelo.\r\n        \r\n        Contrae los pectorales, y empuja la carga hacia arriba hasta que los brazos estén casi extendidos, y luego vuelve a la posición inicial.\r\n        \r\n        Durante todo el movimiento:\r\n        \r\n        1. Mantén los codos hacia afuera para poner el máximo esfuerzo en los pectorales y el mínimo en los deltoides frontales y el tríceps.\r\n		2. Mantén los hombros pegados al banco.', 'Pectorales', 'Mancuernas, banco', 'pressdebancamancuernaplano.jpg', NULL),
(7, 'Aperturas con mancuernas', 'Tumbado en el banco, con los pies en el suelo, una mancuerna en cada mano. Sujeta las pesas con un agarre neutral, con los brazos extendidos sobre el pecho.\r\n        \r\n        Baja lentamente las mancuernas a los lados en un arco con los brazos hasta sentir un estiramiento en los pectorales. No bajes por debajo del nivel de los hombros. Luego vuelve a la posición original, realizando el mismo arco.\r\n        \r\n        Durante todo el movimiento:\r\n        \r\n        1. Mantén los codos apuntando hacia afuera y ligeramente doblados para reducir la tensión en la articulación.\r\n		2. Mantén los hombros pegados al banco.', 'Pectorales', 'Mancuernas, banco', 'aperturasconmancuerna.jpg', NULL),
(8, 'Remo con mancuerna a una mano', 'Coloca tu rodilla izquierda y tu mano izquierda en el banco con el pecho paralelo al suelo. Mantén el pie derecho en el suelo y agarra la mancuerna todavía en el suelo con la mano derecha en un agarre neutral.\r\n        \r\n        Manteniendo el brazo cerca del cuerpo, levanta la mancuerna lo más alto posible levantando el codo y manteniendo el antebrazo perpendicular al suelo. Una vez que la serie termine, haz lo mismo con el otro brazo.', 'Espalda', 'Mancuerna, banco', 'remomancuerna.jpg', NULL),
(9, 'Jalón con agarre ancho', 'Sentado, los muslos bajo las partes acolchadas, la barra agarrada en pronación, las manos más separadas que el ancho de los hombros. Mantén los codos apuntados hacia afuera y la espalda recta.\r\n        \r\n        Tira de la barra hasta llegar a la barbilla. Mantén la contracción por un momento antes de volver lentamente a la posición inicial. Durante el movimiento, no dejes que tus codos se adelanten.', 'Espalda', 'Máquina de jalón, barra', 'jalondeagarreancho.jpg', NULL),
(10, 'Remo en máquina', 'Sentado en el banco de la máquina con los pies en la cuña. Coge la doble manivela que está unida al cable con ambas manos. Mantén la espalda recta y las rodillas ligeramente flexionadas.\r\n        \r\n        Tira de la carga hacia tu abdomen. Aprieta la espalda al final del movimiento llevando los codos lo más atrás posible. Luego vuelve lentamente a la posición inicial.', 'Espalda', 'Máquina de poleas', 'remoconmaquina.jpg', NULL),
(11, 'Jalón al pecho con agarre cerrado', 'Sentado, con los muslos bajo las partes acolchadas, la doble asa agarrada con ambas manos. Manteniendo la espalda recta.\r\n        \r\n        Lleva la carga hasta la parte superior del pecho sin apartar los codos del cuerpo. Mantén la contracción por un momento antes de volver lentamente a la posición inicial.', 'Espalda', 'Máquina de jalón, barra', 'jalonalpechoconagarrecerrado.jpg', NULL),
(12, 'Remo con barra', 'De pie con las rodillas ligeramente flexionadas, agarrando la barra con las manos en pronación, agarre más amplio que el ancho de los hombros. El pecho inclinado hacia adelante, manteniendo la espalda recta, el pecho arqueado.\r\n        \r\n        Tira de la carga hacia el abdomen. Aprieta la espalda al final del movimiento, los hombros y los codos hacia atrás. Luego vuelve lentamente a la posición inicial.', 'Espalda', 'Barra', 'remoconbarra.jpg', NULL),
(13, 'Jalón tras nuca', 'Sentado, los muslos bajo las partes acolchadas, la barra agarrada en pronación, las manos más separadas que la anchura de los hombros. Mantén los codos apuntando hacia afuera y la espalda recta.\r\n        \r\n        Tira de la barra hasta la parte posterior del cuello. Mantén la contracción por un momento antes de volver lentamente a la posición inicial. Durante el movimiento, no dejes que tus codos se adelanten.', 'Espalda', 'Máquina de jalón, barra', 'jalontrasnuca.jpg', NULL),
(14, 'Jalón al pecho con agarre invertido', 'Sentado, muslos bajo las partes acolchadas, barra agarrada en supinación, manos separadas a la anchura de los hombros. Manteniendo la espalda recta.\r\n        \r\n        Tira de la barra hasta la parte superior del pecho. Mantenga la contracción por un momento, los hombros bien atrás antes de volver lentamente a la posición inicial.', 'Espalda', 'Máquina de jalón, barra', 'jalonalpechoconagarreinvertido.jpg', NULL),
(15, 'Press de hombro con mancuernas', 'Sentado en un banco con la espalda bien apoyada contra el respaldo. Sujeta las mancuernas en tus manos (agarre de pronación) ligeramente por encima de la altura de los hombros. Los codos hacia afuera y los antebrazos perpendiculares al suelo.\r\n        \r\n        Levanta las mancuernas hasta que tus brazos estén completamente extendidos. Luego regresa a la posición original.', 'Hombros', 'Mancuernas, banco', 'pressdehombromancuernas.jpg', NULL),
(16, 'Elevación lateral con mancuernas', 'De pie con los pies separados a la anchura de los hombros, los brazos a lo largo del cuerpo y una mancuerna en cada mano.\r\n        \r\n        Levanta lentamente los brazos de lado hasta una posición horizontal, manteniendo los codos ligeramente doblados. Contrae los deltoides por un momento en la posición alta, y luego vuelve lentamente a la posición inicial.', 'Hombros', 'Mancuernas', 'elevacionlateralmancuernas.jpg', NULL),
(17, 'Elevación frontal con mancuernas', 'De pie, con los pies separados a la anchura de los hombros, una mancuerna en cada mano (agarre prono).\r\n        \r\n        Levanta lentamente los brazos hacia adelante hasta que estén paralelos al suelo. Contrae los deltoides durante un momento en la posición final, luego regresa lentamente a la posición inicial.', 'Hombros', 'Mancuernas', 'elevacionfrontalmancuernas.jpg', NULL),
(18, 'Press de hombros en máquina Smith', 'Sentado en un banco con la espalda bien apoyada contra el respaldo. Coloca el banco de manera que la barra caiga justo delante de tu cara. Agarra la barra con las manos en pronación. La espalda bien apoyada contra el respaldo, los codos hacia fuera y los antebrazos perpendiculares al suelo.\r\n        \r\n        Suelta la barra y llévala lentamente a la altura de tu barbilla. Contrae los hombros empujando la carga hacia arriba. Detén el movimiento justo antes de que tus brazos estén completamente extendidos. Luego regresa a la posición baja.', 'Hombros', 'Máquina Smith', 'presshombromaquinasmith.jpg', NULL),
(19, 'Remo alto con barra', 'De pie, sosteniendo la barra frente a ti, agarre en pronación, manos separadas a la altura de los hombros.\r\n        \r\n        Levanta la barra verticalmente hasta la altura del pecho. Contrae por un momento, luego regresa a la posición inicial. Durante todo el movimiento, mantén la barra cerca del cuerpo y los codos más altos que las muñecas.', 'Hombros', 'Barra', 'remoaltoconbarra.jpg', NULL),
(20, 'Elevaciones posteriores para hombros \"Pájaro\"', 'De pie, con las rodillas ligeramente flexionadas, el pecho flexionado hacia adelante, casi paralelo al suelo, manteniendo la espalda recta y la cabeza alineada con la columna. Sostén una mancuerna en cada mano, con las palmas de las manos una frente a la otra.\r\n \r\n Eleva lentamente las mancuernas separándolas de cada lado del cuerpo haciendo un arco con los brazos. Contrae un momento en la posición elevada antes de volver a la posición inicial.', 'Hombros', 'Mancuernas', 'elevacioneshombrospajaro.jpg', NULL),
(21, 'Elevación lateral con cable a una mano', 'De pie con los pies separados a la anchura de los hombros, el lado izquierdo junto a la polea. El asa en tu mano derecha, contra la parte delantera de tu muslo.\r\n \r\n Levanta lentamente tu brazo hacia el lado en un arco hacia la horizontal. Mantén el codo ligeramente doblado. Permanece en la posición elevada por un momento y luego vuelve lentamente a la posición original.', 'Hombros', 'Máquina de poleas', 'elevacionlateralcableunamano.jpg', NULL),
(22, 'Curl con barra', 'De pie, con las rodillas ligeramente dobladas y la espalda recta. Sostén la barra con las manos en supinación, a la anchura de los hombros.\r\n        \r\n        Sin mover el pecho, levanta la barra flexionando los antebrazos. Contrae los bíceps en la posición elevada y deja que la barra baje lentamente hasta la posición inicial. Mantén tus codos cerca del cuerpo durante el movimiento.', 'Bíceps', 'Barra', 'curlbarra.jpg', NULL),
(23, 'Curl alterno con mancuernas', 'De pie, con las rodillas ligeramente dobladas y la espalda recta. Sostén una mancuerna en cada mano, con un agarre neutral a lo largo del cuerpo.\r\n \r\n Sin mover el pecho, eleva la mancuerna flexionando el antebrazo. Durante el movimiento, rota la muñeca hacia afuera hasta que la mano esté en posición supina y recta. Contrae el bíceps, y luego vuelve lentamente a la posición inicial. Mantén el codo cerca del cuerpo durante el movimiento. Alterne este movimiento realizándolo con un brazo tras otro.', 'Bíceps', 'Mancuernas', 'curlalternomancuernas.jpg', NULL),
(24, 'Curl con cuerda en polea', 'De pie frente a la polea, rodillas ligeramente flexionadas, toma la cuerda con ambas manos, en un agarre neutral, brazos relajados a lo largo del cuerpo.\r\n \r\n Sin mover el pecho, flexiona los antebrazos, acercando las manos lo más posible a los hombros, sin llevar los codos demasiado hacia delante. Contrae los bíceps en una posición alta, y luego vuelve lentamente a la posición inicial.', 'Bíceps', 'Máquina de poleas, cuerda', 'curlcuerdapolea.jpg', NULL),
(25, 'Curl con barra EZ', 'De pie, con las rodillas ligeramente dobladas y la espalda recta. Sujeta la barra EZ con las manos en supinación.\r\n \r\n Sin mover el pecho, levantar la barra EZ flexionando los antebrazos. Contrae los bíceps en posición elevada, luego deja que la barra baje lentamente de nuevo hasta la posición inicial. Mantén tus codos cerca del cuerpo durante el movimiento.', 'Bíceps', 'Barra EZ', 'curlbarraEZ.jpg', NULL),
(26, 'Curl de predicador con barra EZ', 'Sentado o de pie, ajusta el apoyabrazos de la máquina \"Larry Scott\" para que esté ligeramente por debajo del nivel de tus hombros. Apoya la parte superior de los brazos en el apoyabrazos y agarra la barra EZ con las manos en supinación.\r\n \r\n Lentamente flexiona los antebrazos hacia los hombros mientras mantienes la parte superior de los brazos presionados contra el apoyabrazos. Contrae tus bíceps en la posición de subida, y luego vuelve lentamente a la posición inicial. Ten cuidado de no extender completamente los antebrazos en la posición baja para evitar poner demasiada tensión en la articulación del codo.', 'Bíceps', 'Máquina de predicador, barra EZ', 'CurlpredicadorbarraEZ.jpg', NULL),
(27, 'Curl alterno de martillo con mancuernas', 'De pie, con las rodillas ligeramente dobladas y la espalda recta. Sujeta una mancuerna en cada mano, en un agarre neutral a lo largo del cuerpo.\r\n \r\n Sin mover el pecho, eleva la mancuerna doblando los antebrazos. Mantén tu mano en un agarre neutral (de ahí el nombre de agarre de martillo). Contrae los bíceps, y luego vuelve lentamente a la posición inicial. Mantén el codo cerca del cuerpo durante el movimiento. Alterne el movimiento realizándolo con un brazo tras otro.', 'Bíceps', 'Mancuernas', 'Curlalternomartillomancuernas.jpg', NULL),
(28, 'Curl inclinado con mancuernas', 'Sentado en un banco con el respaldo inclinado en un ángulo de 40 a 60 grados. Deja que tus brazos cuelguen hacia el suelo. Sujeta una mancuerna en cada mano en supinación.\r\n \r\n Manteniendo la espalda bien apoyada en el respaldo, levanta una mancuerna flexionando el antebrazo hacia el hombro. Contrae los bíceps en la posición alta, y luego vuelve lentamente a la posición inicial. Mantén tu codo cerca de tu cuerpo durante el movimiento. Alterna este movimiento haciéndolo con un brazo y otro.', 'Bíceps', 'Mancuernas', 'curlinclinadomancuerna.jpg', NULL),
(29, 'Extensión de tríceps tumbado', 'Acostado en el banco, con los pies en el suelo o en el banco. Sostén la barra EZ sobre tu pecho, agarre en posición de pronación, las manos ligeramente más cerradas que el ancho de los hombros.\r\n        \r\n       Flexiona lentamente los antebrazos sin separar demasiado los codos, llevando la barra a la parte superior de la cabeza. Luego vuelve a la posición inicial.', 'Tríceps', 'Barra EZ, banco', 'Extensióndetrícepstumbado.jpg', NULL),
(30, 'Extensión de tríceps en polea', 'De pie frente a la polea, agarrando la barra con un agarre de pronación, las manos separadas a la anchura de los hombros.\r\n \r\n Extender los antebrazos hasta que los brazos estén completamente extendidos. En esta posición, contrae tus tríceps durante un momento y luego vuelve lentamente a la posición inicial. Mantén los codos cerca del cuerpo durante todo el movimiento.', 'Tríceps', 'Barra EZ, banco', 'Extensióndetrícepsenpolea.jpg', NULL),
(31, 'Extensión de tríceps en polea con cuerda', 'De pie frente a la polea, agarrar un extremo de la cuerda en cada mano con un agarre neutral.\r\n \r\n Extiende los antebrazos separando ligeramente los extremos de la cuerda hasta que los brazos estén completamente extendidos. En esta posición, contrae tus tríceps por un momento y luego regresa lentamente a la posición inicial. Mantén los codos cerca del cuerpo durante todo el movimiento.', 'Tríceps', 'Máquina de poleas, cuerda', 'Extensióndetrícepsenpoleaconcuerda.jpg', NULL),
(32, 'Extensión de tríceps con mancuernas por encima de la cabeza', 'Sentado en un banco, con la espalda recta, agarrando una mancuerna con ambas manos, las palmas de las manos en el interior de un disco (ver foto). Coloca la mancuerna sobre la cabeza, brazos extendidos, tríceps bien contraídos.\r\n \r\n Baja los antebrazos por detrás de la cabeza hasta que los codos formen un ángulo de 90°. Luego extiende los antebrazos, volviendo a la posición inicial.', 'Tríceps', 'Mancuerna, banco', 'Extensióntrícepsmancuernasporencimacabeza.jpg', NULL),
(33, 'Patadas traseras', 'Coloca tu rodilla izquierda y tu mano izquierda en un banco, con el pecho paralelo al suelo. Mantén el pie derecho en el suelo y agarra la mancuerna con la mano derecha. Manteniéndola cerca de tu cuerpo, levanta la parte superior de tu brazo derecho hasta que esté paralelo al suelo.\r\n \r\n Realiza una extensión del brazo derecho. Cuando esté completamente extendido, contrae tu tríceps por un momento antes de volver a la posición inicial. Una vez que hayas completado tu serie, haz lo mismo con el otro brazo.', 'Tríceps', 'Mancuerna, banco', 'Patadastraseras.jpg', NULL),
(34, 'Extensión de tríceps con cable de agarre inverso con barra', 'Colócate frente a la máquina de cable y agarra la barra recta con un agarre por debajo de la mano (supinado, con las palmas hacia arriba), las manos separadas a la anchura de los hombros, y los codos metidos y doblados en un ángulo un poco menor de 90°.\r\n \r\n Extiende los antebrazos hasta que tus brazos estén completamente estirados. En esta posición, aprieta los tríceps, haz una pausa y vuelve lentamente a la posición inicial. Mantén los codos metidos durante todo el movimiento. Repite el ejercicio el número de repeticiones deseadas.', 'Tríceps', 'Barra recta, cable de polea alta', 'Extensióntrícepscableagarreinversobarra.jpg', NULL),
(35, 'Extensión de tríceps con mancuernas tumbado', 'Túmbate en el banco con los pies apoyados en el suelo o en el banco. Coge una mancuerna en cada mano con un agarre neutro (palmas mirándose) con los brazos extendidos por encima del pecho.\r\n \r\n Baja lentamente los antebrazos, manteniendo los codos metidos lo más posible, hasta que lleguen a la frente. A continuación, vuelve lentamente a la posición inicial. Haz el número de repeticiones deseadas.', 'Tríceps', 'Mancuernas, banco', 'Extensióntrícepsmancuernastumbado.jpg', NULL),
(36, 'Crunch', 'Tumbado en el suelo sobre la espalda con las rodillas dobladas y los pies apoyados en el suelo. Puedes poner las manos detrás de la cabeza o sobre el pecho.\r\n        \r\n       Encoge los abdominales levantando los hombros y la parte superior de la espalda hacia las rodillas. Mantén la parte inferior de la espalda apoyada en el suelo. Quédate en posición vertical por un segundo, y luego vuelve lentamente a la posición original.', 'Abdominales', '', 'Crunch.jpg', NULL),
(37, 'Crunch oblicuo', 'Acostado en el suelo del lado derecho con las rodillas dobladas. Pon tu mano izquierda detrás de la cabeza y tu mano derecha en los abdominales para sentirlos trabajar.\r\n \r\n Contrae los oblicuos del lado izquierdo levantando el hombro hacia la cadera. Mantente en posición vertical por un segundo y luego vuelve lentamente a la posición original.', 'Abdominales', '', 'Crunchoblicuo.jpg', NULL),
(38, 'Abdominales en máquina', 'Sentado en la máquina sujetando las asas.\r\n \r\n Contrae los abdominales y permanece en esa posición un momento antes de volver lentamente a la posición inicial.', 'Abdominales', 'Máquina de crunch', 'Abdominalesmáquina.jpg', NULL),
(39, 'Plancha', 'Tumbado boca abajo en el suelo. Equilíbrate sobre los antebrazos y los dedos de los pies, manteniendo los hombros y los glúteos a la misma altura.\r\n \r\n Mantén esta posición por el tiempo que desees mientras contraes tus abdominales.', 'Abdominales', '', 'Plancha.jpg', NULL),
(40, 'Elevación de piernas', 'Colgando de una barra alta, las manos en pronación.\r\n \r\n Contrae los abdominales moviendo las rodillas y las caderas hacia el pecho. Mantente en posición alta por un segundo, y luego regresa lentamente a la posición inicial.', 'Abdominales', '', 'Elevaciónpiernas.jpg', NULL),
(41, 'Sentadilla', 'De pie con la barra apoyada en el trapecio y los hombros. Toma la barra con las manos para un buen apoyo. Mantén la cabeza recta.\r\n        \r\n       Dobla las rodillas y las caderas como si estuvieras sentado. Mientras mantienes la espalda recta, deja que los glúteos vayan hacia atrás, lo que hará que el pecho se incline ligeramente hacia delante para que el movimiento sea lo más natural posible. En el momento en que los muslos estén paralelos al suelo, muévete hacia arriba, realizando el movimiento en la dirección opuesta. Dada la complejidad de este movimiento, pídele a un entrenador en tu gimnasio que te muestre cómo realizarlo correctamente la primera vez.', 'Piernas', 'Barra', 'Sentadilla.jpg', NULL),
(42, 'Prensa de piernas', 'Sentado en el banco de la prensa, con los pies planos en la plataforma y los hombros separados.\r\n \r\n Suelta el seguro manual y baja lentamente la carga llevando las rodillas hacia el pecho. Cuando las rodillas estén en un ángulo de 90°, haz una pausa momentánea y luego sube lentamente el peso. Para proteger las rodillas, detén el movimiento justo antes de que las piernas estén completamente extendidas. Durante el movimiento, no levantes los glúteos del banco.', 'Piernas', 'Máquina de prensa de piernas', 'Prensapiernas.jpg', NULL),
(43, 'Extensión de piernas', 'Ajusta la máquina de extensión de piernas de manera que cuando te sientes, tus rodillas estén al borde del banco y tus tobillos justo debajo del reposapiés. Siéntate con la espalda bien apoyada en el respaldo, sosteniendo las asas a los lados.\r\n \r\n Extiende las piernas hasta que estén completamente extendidas. Aguanta la carga un momento contrayendo los cuádriceps, y luego vuelve a la posición baja.', 'Piernas', 'Máquina de extensión de piernas', 'Extensiónpiernas.jpg', NULL),
(44, 'Zancada', 'De pie con las piernas separadas a la anchura de la cadera, una mancuerna en cada mano.\r\n \r\n Manteniendo el pecho recto, das un paso adelante y desciendes lentamente hasta que el muslo delantero esté paralelo al suelo. Luego vuelve a la posición original. Una vez que hayas completado tu serie, haz lo mismo con la otra pierna.', 'Piernas', 'Mancuernas', 'Zancada.jpg', NULL),
(45, 'Curl de pierna tumbado en máquina de femoral', 'Túmbate boca abajo en la máquina de \"curl de piernas tumbado\" con la parte trasera de los tobillos presionando el reposapiés. Agarra las asas.\r\n \r\n Apoyado firmemente en el banco, flexiona las piernas lo máximo posible. Mantén la carga por un momento en la posición alta contrayendo los músculos isquiotibiales, luego vuelve lentamente a la posición inicial.', 'Piernas', 'Máquina de femoral', 'Curlpiernatumbadomáquinafemoral.jpg', NULL),
(46, 'Sentadilla Hack', 'De pie en la máquina de \" hack\", trapecios bajo las almohadillas, pies apoyados en el reposapiés, separados a la anchura de los hombros.\r\n \r\n Suelta el seguro manual y dobla lentamente las rodillas. Cuando las rodillas estén en un ángulo de 90°, haz una pausa durante un momento y luego levanta lentamente la carga. Mantén la espalda apoyada firmemente en el respaldo.\r\n \r\n Para proteger las rodillas, en la posición alta, detén el movimiento justo antes de que tus piernas estén completamente extendidas.', 'Piernas', 'Máquina de la sentadilla Hack', 'MáquinasentadillaHack.jpg', NULL),
(47, 'Curl de piernas sentado', 'Ajusta la máquina de curl de piernas de manera que cuando estés sentado, la parte inferior de tus rodillas estén en el borde del banco y la parte posterior de tus tobillos estén justo más allá del reposapiés. Siéntate con la espalda bien apoyada en el respaldo, sosteniendo las asas a los lados.\r\n \r\n Dobla las piernas tanto como sea posible. Mantén el peso por un momento en esta posición contrayendo los músculos isquiales, y luego vuelve a la posición inicial.', 'Piernas', 'Máquina de curl de piernas sentado', 'Curlpiernassentado.jpg', NULL),
(48, 'Elevación de gemelos sentado', 'Sentado en la máquina con la parte delantera de los pies en la cuña y la parte inferior de los muslos bajo las partes acolchadas.\r\n        \r\n       A la vez que contraes los gemelos, levanta los talones lo más alto posible. Permanece en la posición más elevada por un momento, sintiendo bien la contracción. Luego baja lentamente los talones estirando las pantorrillas.', 'Gemelos', 'Máquina de elevación de gemelos sentado', 'Elevacióngemelossentado.jpg', NULL),
(49, 'Elevación de gemelos de pie', 'De pie con la parte delantera de los pies en la cuña y los hombros bajo las partes acolchadas del aparato.\r\n \r\n A la vez que contraes los gemelos, levanta los talones lo más alto posible. Mantente en la posición más elevada por un momento, sintiendo bien la contracción. Luego baja lentamente los talones estirando las pantorrillas.', 'Gemelos', 'Máquina de elevación de gemelos de pie', 'Elevacióngemelospie.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE `estadisticas` (
  `id_estadisticas` int NOT NULL,
  `fecha` date NOT NULL,
  `calorias_quemadas` decimal(7,2) DEFAULT NULL,
  `masa_muscular` decimal(5,2) DEFAULT NULL,
  `id_usuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estadisticas`
--

INSERT INTO `estadisticas` (`id_estadisticas`, `fecha`, `calorias_quemadas`, `masa_muscular`, `id_usuario`) VALUES
(1, '2023-05-27', '430.00', '20.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `altura` decimal(5,2) DEFAULT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `poblacion` varchar(50) DEFAULT NULL,
  `imagen_perfil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`, `fecha_nacimiento`, `altura`, `peso`, `provincia`, `poblacion`, `imagen_perfil`) VALUES
(1, 'Alejandro', 'Madolell Berrocal', 'aleyrodi@hotmail.es', '$2y$10$0yRvsaacUX9vdJMbs0uXSO2i1yPddjRmGhsn7I.tQq9.4.2xH8fvO', '1998-09-29', '176.00', '63.00', 'Melilla', 'Melilla', NULL),
(2, 'admin', '', 'admin@admin.com', '$2y$10$.eXLCgrHErj7lFmSFelAkOZaHvFUquak12zTPzSQiLeMJIDLWKt.2', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`id_ejercicio`),
  ADD KEY `fk_ejercicios_usuarios` (`id_usuario`);

--
-- Indices de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD PRIMARY KEY (`id_estadisticas`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `id_ejercicio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  MODIFY `id_estadisticas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD CONSTRAINT `fk_ejercicios_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD CONSTRAINT `estadisticas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
