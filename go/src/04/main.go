package main

import (
	"04/tree"
	"fmt"
)

func main()  {
	node1 := tree.NodeTree{"我是最高级value",nil,nil}

	node1.Left = &tree.NodeTree{Value:"我是一级左侧value"}
	node1.Right = &tree.NodeTree{Value:"我是一级右侧value"}
	node1.Left.Left = &tree.NodeTree{Value:"我是一级左侧二级左侧value"}
	node1.Left.Right = &tree.NodeTree{Value:"我是一级左侧二级右侧value"}
	node1.Right.Left = &tree.NodeTree{Value:"我是一级右侧二级左侧value"}
	node1.Right.Right = &tree.NodeTree{Value:"我是一级右侧二级右侧value"}

	fmt.Println("--左侧遍历--")
	//node1.LeftPrint()
	fmt.Println("--右侧遍历--")
}
