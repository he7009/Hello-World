package main

import "fmt"

func main() {

	//变量定义  var
	var var1 int
	var var2 string
	var var3 int32 = 10

	var1 = 10
	var2 = "duanyude"

	fmt.Println(var1)
	fmt.Println(var2)
	fmt.Println(var3)

	//变量定义 ：=
	var4 := 200
	var5 := "duanyude"
	var6 := true
	var7 := 'A'

	var8,var9,var10 := 111,222,333
	var9,var10 = var10,var9

	fmt.Println(var4,var5,var6,var7,var8,var9,var10)

	//常量 const

	const pi float64  = 3.14
	const helilan string  = "何丽兰"

	fmt.Println(pi,helilan)

	const con1 = iota
	const con2 = iota
	const con3 = iota

	const (
		con4 int = iota
		con5 = iota * 2
		con6 = iota * 3
		con7 = iota * 4
	)

	const (
		con8 string = "段育德"
		con9 string = "贾宁"
		con10 bool = true
	)

	fmt.Println(con1,con2,con3,con4,con5,con6,con7,con8,con9,con10)





}
