<?php

const _APP_VERSION = 1;
const _GAME_ROUNDS = 20;
const _Orderus_Props_ = [
    'health' => [
        'min' => 70,
        'max' => 100,
    ],
    'strength' => [
        'min' => 70,
        'max' => 80,
    ],
    'defence' => [
        'min' => 45,
        'max' => 55
    ],
    'speed' => [
        'min' => 40,
        'max' => 50,
    ],
    'luck' => [
        'min' => 10,
        'max' => 30,
    ],
    'skills' => ['RapidStrike', 'MagicShield'],
];
const _DEFENCE_SKILL = "defence";
const _ATTACK_SKILL = "attack";
const _Lucky = "lucky";
const _Beasts_Props_ = [
    'health' => [
        'min' => 60,
        'max' => 90,
    ],
    'strength' => [
        'min' => 60,
        'max' => 90,
    ],
    'defence' => [
        'min' => 40,
        'max' => 60
    ],
    'speed' => [
        'min' => 40,
        'max' => 60,
    ],
    'luck' => [
        'min' => 25,
        'max' => 40,
    ],
];