package main

import (
	"fmt"
)

type base struct {
	name string
	age  int
	sex  int
}

type person struct {
	base
	country string
}

func (person *base) changeName(newName string) {
	person.name = newName
}

func (person *person) changeName(newName string) {
	person.name = newName
}

func main() {
	var base = base{"helilan", 12, 1}
	var duanyude = person{base, "china"}
	fmt.Println(duanyude)

	duanyude.name = "duanyude"
	duanyude.age = 12
	duanyude.sex = 1
	duanyude.country = "china"
	fmt.Println(duanyude)

	duanyude.changeName("helilan")

	fmt.Println(duanyude)

}
