package main

import "fmt"

//变量的定义赋值
/**
1.变量的定义包含两种形式纯定义或者定义加赋值
2.纯定义 使用 var 关键字 可以通过使用（）进行多个变量的定义
3.定义加赋值 可以通过赋值推断类型，故可以省略变量类型，可以通过 := 省略 var关键字

备注：变量如果不赋值，则保持对应类型的零值
*/
//纯定义
func vc() {
	// 纯定义-单个定义
	var vc1 int
	var vc2 string
	var vc3 bool

	vc1 = 10
	vc2 = "段育德"

	fmt.Println(vc1, vc2, vc3)
	// 纯定义-多个定义
	var (
		vc4 int
		vc5 string
		vc6 bool
	)

	vc4 = 60
	vc6 = true

	fmt.Println(vc4, vc5, vc6)
}

//定义加赋值
func df() {
	//单个
	var df1 int = 10
	var df2 string = "duanyude"
	var df3 bool = true

	//单个不指定类型
	var df4 = 10
	var df5 = "duanyude"
	var df6 = true

	fmt.Println(df1, df2, df3, df4, df5, df6)

	//单个省略 var
	df7 := 22
	df8 := "strting"

	fmt.Println(df7, df8)

	//多个
	var dfd1, dfd2, dfd3 int = 33, 44, 55    //指定类型，则只能是一种类型
	var dfd4, dfd5, dfd6 = "duan", false, 33 //不指定类型，通过赋值推断类型
	dfd7, dfd8, dfd9 := "ddd", true, true    //不能指定类型

	fmt.Println(dfd1, dfd2, dfd3, dfd4, dfd5, dfd6, dfd7, dfd8, dfd9)
}

//常量是无类型的只要在对应的值域内就可以赋值给对应的类型的变量
//定义常量时也可以指定类型
//常量的赋值是编译器行为，因此运行期的内容不能放在常量等式的右侧
//例如：12 可以赋值给 int、uint、float 等类型
//预定义常量  true,false,iota
func cst() {
	const ee = "duanyude"
	const dd int = 30
	fmt.Println(ee, dd)
}

//array 的定义

func arr() {
	var (
		arr1 [3]int
		arr2 [3]string
		arr3 [2]float32
	)

	fmt.Println(arr1, arr2, arr3)

	var arr4 = [3]int{1, 2, 3}
	var arr5 = [3]string{"3", "3", "4"}
	var arr6 = [2]float32{223.0, 4.5}

	fmt.Println(arr4, arr5, arr6)

	arr7, arr8, arr9 := [4]int{}, [3]string{2: "4"}, [4]float32{}

	fmt.Println(arr7, arr8, arr9)

}

func makeqp() {
	var qp []int
	fmt.Println(qp)

	var qp2 = []int{12, 22}

	qp2[1] = 399

	fmt.Println(qp2)

	qp3, qp4 := make([]float32, 30, 39), make([]float32, 30, 39)

	fmt.Println(qp3, qp4)

	var qp5 = make([]float32, 30, 39)

	fmt.Println(qp5)
}

func main() {
	makeqp()
}
