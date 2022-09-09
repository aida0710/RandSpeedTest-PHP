import math
import random

import time


# https://github.com/lazyperson0710/RandSpeedTest/blob/main/Main.php のPython版になります
# Pythonにはrandom系は二種類しかないのであまり意味はないですがPythonの練習なので気にしないで、、、！
# クラスがあるのも練習の為です、、、
class RandSpeedTest:
    WHOLE = 100
    PARTIAL = 1000000

    def __init__(self):
        self.calculation()

    def calculation(self):
        result = []
        total_time = time.time()
        for j in range(self.WHOLE):
            partial_time = time.time()
            try:
                for i in range(self.PARTIAL):
                    # random.random()
                    random.uniform(1, 1000)
                    # random.randint(1, 1000)
            except Exception as e:
                print(e)
            finally:
                partial_time = time.time() - partial_time
                partial_time = math.floor(partial_time * 10 ** 2) / (10 ** 2)
                result.append(partial_time)
                whole = self.WHOLE
                print(f"{j} / {whole}  - {partial_time} 秒")
        result = sum(result)
        total_time = time.time() - total_time
        total_time = math.floor(total_time * 10 ** 7) / (10 ** 7)
        average = result / j
        average = math.floor(average * 10 ** 7) / (10 ** 7)
        print(f"計算時間: {total_time} 秒")
        print(f"平均時間: {average} 秒")


print(RandSpeedTest())
