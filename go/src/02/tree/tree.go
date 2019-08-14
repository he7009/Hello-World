package tree

type Node struct {
	Value string
	Left *Node
	Right *Node
}

func (obj Node) Print(){
	print(obj.Value)
}
