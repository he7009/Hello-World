package main

import "fmt"

type Integer int

type Zz interface {
	add(b Integer) Integer
	sub(b Integer)
}

func main() {
	var aa Integer = 100
	var bb Integer = 10
	var cc Zz

	cc = &aa
	cc.add(bb)
	fmt.Println((*cc))
	cc.sub(bb)
	fmt.Println((*cc))

}

func (a Integer) add(b Integer) Integer {
	a = a + b
	return a
}

func (a *Integer) sub(b Integer) {
	*a = *a - b
}
