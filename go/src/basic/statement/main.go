package main

import (
	"fmt"
)

func returnTest(num int) string {
	if num > 5 {
		return "大于5"
	} else {

		return "小于5"
	}
}

func forTest() {
dd:
	for i := 0; i < 5; i++ {
		for j := 10; j < 50; j += 10 {
			for k := 100; k < 500; k += 100 {
				if k == 300 {
					break dd
				}
				fmt.Println("duanyude")
			}
		}

	}
}

func main() {
	forTest()
}
