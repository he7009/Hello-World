package main

import (
	"02/tree"
	"fmt"
)

type body struct {
	age int
	addr string
}

func (obj body) print(){
	fmt.Println("我的年龄是：",obj.age)
	fmt.Println("我的地址是：",obj.addr)
}

func main() {

	var helilan body
	helilan.age = 28
	helilan.addr = "中国 上海 浦东新区"
	helilan.print()

	duanyude := body{18,"上海市 浦东新区",}
	duanyude.print()

	fmt.Println("--import tree 结构体--")

	var ppp tree.Node
	ppp.Value = "源Value"

}
