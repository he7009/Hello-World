package main

import "fmt"

func main() {
	//变量定义 var 或者 :=
	var var1 int = 10
	var var2 string = "段育德"
	var var3 bool = true
	var var4 float32 = 10
	var var5 byte = 'A'
	var var6 rune = 1999


	var var7 [2]int
	var var8 []int
	var var9 map[string]int
	var var10 struct{
		f int
	}
	var var11 *int


	fmt.Println(var1,var2,var3,var4,var5,var6,var7,var8,var9,var10,var11)

	var vv1,vv2,vv3 int = 1,2,3
	var (
		v1,v2,v3 int = 33,33,44
		v4,v5 string
	)

	aa1,aa2,aa3 := 1,2,3

	fmt.Println(vv1,vv2,vv3)
	fmt.Println(v1,v2,v3,v4,v5)
	fmt.Println(aa1,aa2,aa3)

	var arr1 [3]int
	var arr2 = [2]int{10,20}
	var arr3,arr4,arr5 = [3]int{10,20,30},29,30
	arr6,arr7,arr8 := [3]int{33,33,33},[2]string{"duan","yu"},[...]int{22}
	fmt.Println(arr1,arr2)
	fmt.Println(arr3,arr4,arr5)
	fmt.Println(arr6,arr7,arr8)



}
