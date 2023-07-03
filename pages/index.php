<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style-index.css">
    <title>Minha Página</title>
</head>

<body>
    <div class="menu">
        <h2 class="title">Inscrição cursos 2023</h2>
        <h2 class="subtitle">É fácil, rápido e grátis</h2>
        <hr>
        <h2 class="course-title">SELECIONE O CURSO:</h2>
        <div class="course-list">
            <ul>
                <?php
                $cursosDisponiveis = array(
                    'bateria', 'teclado', 'violao', 'Canto',
                    'Teatro', 'Flauta', 'Violino', 'Viola',
                    'Trompa', 'Trompete', 'Saxofone', 'Contrabaixo',
                    'Violoncelo', 'Ballet', 'Ballet Que Dança', 'Ballet Fitness',
                    'Dança Contemporânea', 'Dança de Salão', 'Dança do ventre', 'Pilates',
                    'Zumba', 'Teakwondo', 'Futsal', 'Karatê',
                    'Natação', 'Hidroginástica', 'Capoeira', 'Inglês'
                    
                );

                $cursosExibidos = array(
                    'bateria' => 'Bateria', 'teclado' => 'Teclado',
                    'violao' => 'Violão', 'Canto' => 'Canto',
                    'Teatro' => 'Teatro', 'Flauta' => 'Flauta',
                    'Violino' => 'Violino', 'Viola' => 'Viola',
                    'Trompa' => 'Trompa', 'Trompete' => 'Trompete',
                    'Saxofone' => 'Saxofone', 'Contrabaixo' => 'Contrabaixo',
                    'Violoncelo' => 'Violoncelo', 'Ballet' => 'Ballet',
                    'Ballet Que Dança' => 'Ballet Que Dança', 'Ballet Fitness' => 'Ballet Fitness',
                    'Dança Contemporânea' => 'Dança Contemporânea', 'Dança de Salão' => 'Dança de Salão',
                    'Dança do ventre' => 'Dança do ventre', 'Pilates' => 'Pilates',
                    'Zumba' => 'Zumba', 'Teakwondo' => 'Teakwondo',
                    'Futsal' => 'Futsal', 'Karatê' => 'Karatê',
                    'Natação' => 'Natação', 'Hidroginástica' => 'Hidroginástica',
                    'Capoeira' => 'Capoeira', 'Inglês' => 'Inglês',
                );

                foreach ($cursosDisponiveis as $curso) {
                    if (array_key_exists($curso, $cursosExibidos)) {
                        echo '<li class="course-box"><label for="' . $curso . '">' . $cursosExibidos[$curso] . ': </label><input type="radio" id="' . $curso . '" name="curso"></li>';
                    }
                }
                ?>
            </ul>
        </div>
        <button class="continue-button">Continuar Inscrição</button>
    </div>
    <div class="content">
        <!-- Conteúdo principal do site aqui -->
    </div>
    <script>
        // Obtém todos os radio buttons dentro da lista de cursos
        const radioButtons = document.querySelectorAll('.menu .course-list input[type="radio"]');

        // Adiciona um evento de clique a cada radio button
        radioButtons.forEach(radio => {
            radio.addEventListener('click', function() {
                // Remove a classe 'selected' de todos os <li>
                const listItems = document.querySelectorAll('.menu .course-list li');
                listItems.forEach(item => {
                    item.classList.remove('selected');
                });

                // Adiciona a classe 'selected' ao <li> correspondente ao radio button selecionado
                const listItem = this.closest('li');
                listItem.classList.add('selected');
            });
        });
    </script>


</body>

</html>
