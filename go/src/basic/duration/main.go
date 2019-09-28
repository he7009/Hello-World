package main

import "fmt"

type intdyd int

func (dydnum intdyd) add() {
	dydnum++
}

func (dydnum *intdyd) sub() {
	*dydnum--
}

type bbb interface {
	mult()
}

func main() {
	var a intdyd = 3
	(&a).add()
	fmt.Println(a)
	(&a).sub()
	fmt.Println(a)
}
