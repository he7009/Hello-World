package main

import (
	"fmt"
	"runtime"
	"sync"
	"time"
)

func main() {
	fmt.Println(runtime.NumCPU())
	runtime.GOMAXPROCS(2)
	var wg sync.WaitGroup
	wg.Add(2)

	fmt.Println("Create Go Groutine")

	go func() {
		defer wg.Done()

		for count := 0; count < 3; count++ {
			for char := 'a'; char < 'a'+26; char++ {
				time.Sleep(1000000000)
				fmt.Printf("%c ", char)
			}
		}
	}()

	go func() {
		defer wg.Done()

		for count := 1; count < 3; count++ {
			for char := 'A'; char < 'A'+26; char++ {
				time.Sleep(1000000000)
				fmt.Printf("%c ", char)
			}
		}
	}()

	fmt.Println("Waiting To Finish")
	wg.Wait()

	fmt.Println("\nTerminating Proram")
}
