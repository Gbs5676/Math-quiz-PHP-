<?php
function generateRandomNumber($min, $max, $limit = 10) {
    return rand($min, min($max, $limit));
}

function generateRandomOperator() {
    $operators = ['+', '-', '*', '/'];
    return $operators[array_rand($operators)];
}

function isCorrectAnswer($num1, $num2, $op, $userAnswer) {
    $answer = 0;
    switch ($op) {
        case '+':
            $answer = $num1 + $num2;
            break;
        case '-':
            $answer = $num1 - $num2;
            break;
        case '*':
            $answer = $num1 * $num2;
            break;
        case '/':
            if ($num2 != 0) {
                $answer = $num1 / $num2;
            } else {
                $answer = 'Não é possível dividir por zero';
            }
            break;
    }
    return $userAnswer == $answer;
}

$score = 0;

echo "Escolha o nível de dificuldade: (1[FÁCIL]/2[MÉDIO]/3[DIFÍCIL])";
$difficulty = (int)readline("Digite o número correspondente ao nível de dificuldade: ");

while (true) {
    $num1 = generateRandomNumber(1, 10);
    $num2 = generateRandomNumber(1, 10);
    $op = generateRandomOperator();

    if ($difficulty == 2) {
        $num1 = generateRandomNumber(1, 20);
        $num2 = generateRandomNumber(1, 20);
    } elseif ($difficulty == 3) {
        $num1 = generateRandomNumber(1, 50);
        $num2 = generateRandomNumber(1, 50);
    }

    echo "Você sabe quanto é $num1 $op $num2? ";
    $userAnswer = (int)readline("Digite a resposta: ");

    if (isCorrectAnswer($num1, $num2, $op, $userAnswer)) {
        echo "Parabéns!\n";
        $score++;
    } else {
        $correctAnswer = 0;
        switch ($op) {
            case '+':
                $correctAnswer = $num1 + $num2;
                break;
            case '-':
                $correctAnswer = $num1 - $num2;
                break;
            case '*':
                $correctAnswer = $num1 * $num2;
                break;
            case '/':
                if ($num2 != 0) {
                    $correctAnswer = $num1 / $num2;
                } else {
                    $correctAnswer = 'Não é possível dividir por zero';
                }
                break;
        }
        echo "Errou. A resposta correta é $correctAnswer.\n";
    }

    echo "Deseja continuar? (S[SIM]/N[NÃO])";
    $choice = readline("Digite o número correspondente à opção: ");
    if ($choice != 's' && $choice != 'S') {
        break;
    }
}

echo "\nSua pontuação final é: $score\n";
?>