package main

import (
	"fmt"
	"math/rand"
	"sync"
	"time"
)

var wg sync.WaitGroup

func init() {
	rand.Seed(time.Now().Unix())
}

func main() {
	const (
		numberGoroutines = 1000
		taskLoad         = 100000
	)

	wg.Add(numberGoroutines)

	tasks := make(chan string, 10)

	for gr := 1; gr <= numberGoroutines; gr++ {
		go worker(tasks, gr)
	}

	for post := 1; post <= taskLoad; post++ {
		tasks <- fmt.Sprintf("Task: %d", post)
	}

	close(tasks)

	wg.Wait()

}

func worker(tasks chan string, worker int) {
	defer wg.Done()
	for {
		tasks, ok := <-tasks
		if !ok {
			fmt.Printf("Worker: %d Shutting Down\n", worker)
			return
		}

		fmt.Printf("Worker: %d Started %s\n", worker, tasks)

		sleep := rand.Int63n(100)
		time.Sleep(time.Duration(sleep) * time.Millisecond)

		fmt.Printf("Worker: %d Completed %s\n", worker, tasks)
	}
}
