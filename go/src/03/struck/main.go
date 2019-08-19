package main

import "fmt"

type customType struct {
	age int
	name string
}

func (custom *customType) print(){
	fmt.Println(custom.age)
	fmt.Println(custom.name)
}

func main() {
	var custom1 customType
	custom1.age = 46
	custom1.name = "duanyude"

	custom1.print()
}
