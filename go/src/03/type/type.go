package main

func calcu(var1,var2 float32,calcutype string) float32{
	var result float32
	switch calcutype {
		case "+":
			result = var1 + var2
		case "-":
			result = var1 - var2
		case "*":
			result = var1 * var2
		case "/":
			result = var1/var2
	}
	return result
}

func ss() {
	////bool类型 bool 不支持自动或强制类型转换
	//var var1 bool = true
	//var var2  = false
	//var3 := true
	//var var4 bool
	//var4 = (1 == 1)
	//
	//fmt.Println(var1,var2,var3,var4)
	//
	////整形 浮点型
	//var int1 int = 100
	//var int2 int = 110
	//var float1 float64 = 213.255
	//var byte1 byte = 'B'
	//
	//int1 = 65
	//
	//fmt.Println(int1,int2,float1)
	//
	//fmt.Println(int1 + int2)
	//
	//fmt.Println(float64(int1) + float1)
	//
	//
	//fmt.Println()
	//
	//fmt.Printf("byte: %d \n",byte1)
	//
	//fmt.Printf("%t \n",byte1)
	//
	//fmt.Printf("float1:%0.2f",float1)
	//
	//
	//fmt.Println()
	//fmt.Println("----------------------加减法-----------------------------")
	//var cal1,cal2 float32 = 10,1
	//ee := calcu(cal1,cal2,"/")
	//fmt.Println(ee)

	//字符串
	//fmt.Println("------------------字符串start------------------------")
	//var str string = "Hello World;你好世界！"
	//println(str)
	//var length int
	//length = len(str)
	//fmt.Println(length)

	//for i := 1; i < length; i++{
	//	ch := str[i]
	//	println(i,ch)
	//}

	//for i,ch := range str{
	//	fmt.Printf("index:%d,value:%c\n",i,ch)
	//}


	//数组
	//arr := [2][5]int{{0,10,20,30,40},{21,22,23,24,25}}
	//arr[0][1] = 1000
	//fmt.Println(arr)
	//
	//for i,v := range arr{
	//	for i1,v1 := range v{
	//		fmt.Printf("%d_%d:%v\n",i,i1,v1)
	//	}
	//}



}
