package main

import (
	"fmt"
	"runtime"
	"sync"
)

var wg sync.WaitGroup

func psu(progress string) {
	defer wg.Done()

next:
	for num1 := 2; num1 < 5000; num1++ {
		for num2 := 2; num2 < num1; num2++ {
			if num1%num2 == 0 {
				continue next
			}
		}
		fmt.Printf("%s :%d\n", progress, num1)
	}

	fmt.Println("Completed", progress)
}

func main() {
	runtime.GOMAXPROCS(1)
	wg.Add(2)

	fmt.Println("Create Goroutines")

	go psu("A")
	go psu("B")

	fmt.Println("Waiting To Finish")
	wg.Wait()

	fmt.Println("Terminating Program")

}
