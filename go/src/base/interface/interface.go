package main

import "fmt"

type basePerson interface {
	changeName(newName string)
}

type person struct {
	name string
	age  int
}

func (p person) changeName(newName string) {
	p.name = newName
}

func main() {
	var bb = person{"duanyude", 18}
	var BasePerson basePerson = bb

	fmt.Printf("%#v \n", BasePerson)
	fmt.Println(bb)

	bb.name = "何丽兰"

	fmt.Println(BasePerson)
	fmt.Println(bb)

	BasePerson.changeName("jianing")
	fmt.Println(BasePerson)
	fmt.Println(bb)

}
