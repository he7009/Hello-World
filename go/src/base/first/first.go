package main

import (
	"fmt"
	"log"
)

func main() {
	defer func() {
		if i := recover(); i != nil {
			log.Printf("Runtime error caught: %v", i)
		}
	}()
	moreArgs(1, 2, 3, 4, 5, 6)

	var ggg = 0
	for {
		ggg++
		if ggg >= 10 {
			return
		}
		fmt.Println(ggg)
	}

}

func moreArgs(args ...int) {
	for k, arg := range args {
		fmt.Println(k)
		fmt.Println(arg)
		panic("ahhahahaha")
	}
}
