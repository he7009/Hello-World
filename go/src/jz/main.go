package main

import (
	"fmt"
	"sync"
)

var (
	counter int64
	wg      sync.WaitGroup
	mutex   sync.Mutex
)

func main() {

	wg.Add(2)

	go inCounter(1)
	go inCounter(2)

	wg.Wait()

	fmt.Println("Final Counter:", counter)

}

func inCounter(id int) {
	defer wg.Done()
	mutex.Lock()
	{
		for count := 0; count < 100000; count++ {
			counter++
		}
	}
	mutex.Unlock()
}
