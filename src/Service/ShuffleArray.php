<?php

namespace App\Service;

class ShuffleArray
{
    static public function shuffle(array $target): array {
        $a = $target;
        $b = $a;

        shuffle($b);

        while (self::hasSameSibling($a, $b)) {
            shuffle($b);
        }

        return $b;
    }

    static private function hasSameSibling(array $a, array $b): bool
    {
        foreach ($a as $i => $p) {
            if ($p === $b[$i]) {
                return true;
            }
        }

        return false;
    }
}
