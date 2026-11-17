<?php

class MainController
{
    public function main()
    {
        echo 'Главная страница';
    }

    public function sayHello(string $name)
    {
        echo 'Привет, ' . htmlspecialchars($name);
    }

    public function sayBye(string $name)
    {
        echo 'Пока, ' . htmlspecialchars($name);
    }
}
