package main

import (
	"fmt"
	"math/rand"
	"sync"
	"time"
)

var (
	wg sync.WaitGroup
)

func main() {
	//添加两个gorounter
	wg.Add(2)

	court := make(chan int)
	go player("段育德", court)
	go player("何丽兰", court)

	court <- 1

	wg.Wait()

	fmt.Println("competition is over")

}

func player(name string, court chan int) {
	defer wg.Done()
	for {
		ball, ok := <-court
		if !ok {
			fmt.Printf("Player: %s Won\n", name)
			return
		}
		rand.Seed(time.Now().UnixNano())
		n := rand.Intn(100)
		if n%13 == 0 {
			fmt.Printf("Player: %s Missed\n", name)
			close(court)
			return
		}
		fmt.Printf("Player %s Hit %d\n", name, ball)
		ball++

		court <- ball

	}
}
