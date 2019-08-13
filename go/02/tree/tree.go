package tree

import "fmt"

type Node struct {
	Value string
	Left *Node
	Right *Node
}

func (obj Node) LeftPrint(){
	fmt.Println(obj.Value)
}
