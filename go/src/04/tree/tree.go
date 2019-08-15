package tree

import "fmt"

type NodeTree struct {
	Value string
	Left *NodeTree
	Right *NodeTree
}

func (node *NodeTree) LeftPrint(){
	if node == nil {
		return
	}

	node.Left.LeftPrint()
	fmt.Println(node.Value)
	node.Right.LeftPrint()
}


