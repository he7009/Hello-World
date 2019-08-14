package main

import "fmt"

type Node struct {
	Value string
	Left *Node
	Right *Node
}

func (objj *Node) trav(){
	if objj == nil {
		return
	}
	objj.Left.trav()
	fmt.Println(objj.Value)
	objj.Right.trav()
}

func main() {
	var node1 = Node{Value:"我是最高级value"}
	//node1.Left = &Node{"我是左侧1级value",nil,nil}
	//node1.Right = &Node{"我是右侧1级value",nil,nil}
	//node1.Right.Left = &Node{Value:"我是右侧二级左侧value"}
	//node1.Right.Right = &Node{Value:"我是右侧二级右侧value"}
	//node1.Left.Left = &Node{Value:"我是左侧二级左侧value"}
	//node1.Left.Right = &Node{Value:"我是左侧二级右侧value"}


	node1.Left.Right.trav()

}
