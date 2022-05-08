<?php

class Main {

    /*
     * 全ての計算を終えてからコンソールに出力するためWHOLEやPARTIALの数値を大きくしすぎるといつまでたっても終わらない現象が発生します
     * もし、途中経過を出力させず最後にまとめて出力させたい場合はob_start();とecho ob_get_clean();をコメントアウトから外してあげてください
     * ループ中のio処理がなくなって単純に早くなります(大して変わらないので自己満足程度だと思います
     *
     *
     * */
    const WHOLE = 100;
    const PARTIAL = 1000000;

    public function __construct() {
        $this->rand();
    }

    private function rand(): void {
        //ob_start();
        $result = null;
        $totalTime = microtime(true);
        for ($j = 1; $j <= self::WHOLE; $j++) {
            $partial_time = microtime(true);
            try {
                /*
                 * 速度を図りたい関数をコメントアウトから外してください
                 * 当たり前ですがコメントアウトした関数は計測対象から外れます
                 * */
                for ($i = 0; $i <= self::PARTIAL; $i++) {
                    //rand(1, 1000);
                    mt_rand(1, 1000);
                    //random_int(1, 1000);
                }
            } catch (Exception $e) {
                return;
            }
            $partial_time = microtime(true) - $partial_time;
            $partial_time = sprintf("%.7f", $partial_time);
            $result[] = $partial_time;
            $whole = self::WHOLE;
            echo "{$j}/{$whole} - {$partial_time} 秒\n";
        }
        //echo ob_get_clean();
        $result = array_sum($result);
        $totalTime = microtime(true) - $totalTime;
        $totalTime = sprintf("%.7f", $totalTime);
        $average = $result / $j;
        $average = sprintf("%.7f", $average);
        echo "合計出力時間 : {$totalTime}\n";
        echo "平均時間 : {$average}";
    }
}

new Main();