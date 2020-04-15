/************************************************************************************************/
        /******************* PROJECT OF DATA STRUCTURES **********************/
        /************************* PROJECT TITLE *****************************/
        /*************** UNDO AND REDO OPERATION USING STACK *****************/
/************************************************************************************************/


#include <iostream>
#include<conio.h>
#include<math.h>
#include<windows.h>
using namespace std;


/********** MAX SIZE OF STACK **********/
#define MAX 25

/********** DECLARATION OF ARRAYS FOR UNDO AND REDO AS A STACK **********/
    int STACK1[MAX];
    int STACK2[MAX];

/********** INITIALLY BOTH STACKS ARE EMPTY **********/
int top1 = -1;
int top2 = -1;


/******************************************* FUNCTIONS FOR UNDO/REDO  **********************************************/

/******* FUNCTION TO INSERT VALUES IN STACK1 **********/
     void push1(float total)
     {

        top1 ++;
        if(top1 < MAX)
         {
            STACK1[top1] = total;
         }

         else
         {
            cout<<"STACK FULL"<<endl;
            top1--;
         }

     }
/**************** END OF FUNCTION *******************/


/********** FUNCTION TO INSERT VALUES IN STACK2 AFTER UNDO OPERATION **********/
     void push2(int total)
     {

        top2++;
        if(top2 < MAX)
         {
            STACK2[top2] = total;
         }

         else
         {
            cout<<"STACK FULL"<<endl;
            top2--;
         }

     }
/**************************** END OF FUNCTION **********************************/



/**************** FUNCTION USED FOR UNDO OPERATION/ DELETE VALUES FROM STACK1  *******************/
	int pop1()
    {
		 if(top1 == -1)
		 {
            cout<<"STACK IS EMPTY"<<endl;
            return NULL;
		 }
        else
		{
           int total = STACK1 [top1];
            STACK1[top1]= NULL;
            top1--;
            return total;
		 }

     }
/**************************** END OF FUNCTION **********************************/

/**************** FUNCTION USED FOR REDO OPERATION/ DELETE VALUES FROM STACK2 *******************/
	int pop2()
    {
		 if(top2 == -1)
		 {
            cout<<"STACK IS EMPTY"<<endl;
            return NULL;
		 }
        else
		{
           int total = STACK2 [top2];
            STACK2[top2]= NULL;
            top2--;
            return total;
		 }

     }
/**************************** END OF FUNCTION **********************************/

/******************************************* END OF UNDO/REDO FUNCTIONS **********************************************/




/******************************************* FUNCTIONS FOR CALCULATIONS **********************************************/

     int sum(int a, int b)
     {
         int c =  a+b;
         return c;
     }



     int diff(int a, int b)
     {
         int c =  a-b;
         return c;
     }



     int mul(int a, int b)
     {
         int c =  a*b;
         return c;
     }



     float div(float a, float b)
     {
         int c =  a/b;
         return c;
     }


     int sqrRoot(int a)
     {
         int c =  sqrt(a);
         return c;
     }


     double power(double a, double b)
     {
         int c =  pow(a,b);
         return c;
     }


     int fac(int a)
     {   int c = 1;
         for(int i=a; i>=1; i--)
           c = c*i;
         return c;
     }

/******************************************* END OF FUNCTIONS FOR CALCULATION **********************************************/



/******************************************* START OF MAIN FUNCTION **********************************************/

int main()
{
	int num1, num2, result;
	char menu,choice, option, operation;

cout<<"\n\n\n\n\n\n\n\n\n\t\t\t****************************************************";
cout<<"\n\t\t\t****************************************************";
cout<<"\n\t\t\t*                                                  *";
cout<<"\n\t\t\t*                                                  *";
cout<<"\n\t\t\t*                   WELCOME                        *";
cout<<"\n\t\t\t*            --------------------                  *";
cout<<"\n\t\t\t*                                                  *";
cout<<"\n\t\t\t*                                                  *";
cout<<"\n\t\t\t*            PRESS '$' FOR CONTINUE                *";
cout<<"\n\t\t\t*                                                  *";
cout<<"\n\t\t\t*                                                  *";
cout<<"\n\t\t\t*                                                  *";
cout<<"\n\t\t\t****************************************************";
cout<<"\n\t\t\t****************************************************\n\n\n\t\t\t";
cin>>menu;


if(menu == '$')
{

	do
    {   system("cls");
        cout<<"\n\n\n\n\n\n\n\n\n\t***********************************************************************************************";
        cout<<"\n\n\n\t\t\t Enter C for Calculation, U for UNDO and R for REDO\n\n\t\t\t ";
        cin>>option;
        system("cls");
        switch(option)
        {
        case 'C':
            cout<<"\n\n\n\n\n\t***********************************************************************************************";
            cout<<"\n\n\n\t\t\t\t CHOOSE CORRESPONDING OPTION FOR OPERATION \n\t\t\t ";
            cout<<"\n\n\t***********************************************************************************************";
            cout<<"\n\n\n\t\t\t\t\t   A FOR ADDITION \n\t\t\t ";
            cout<<"\n\n\t\t\t\t\t   S FOR SUBTRACTION \n\t\t\t ";
            cout<<"\n\n\t\t\t\t\t   M FOR MULTIPLICATION \n\t\t\t ";
            cout<<"\n\n\t\t\t\t\t   D FOR DIVISION \n\t\t\t ";
            cout<<"\n\n\t\t\t\t\t   R FOR SQUAREROOT \n\t\t\t ";
            cout<<"\n\n\t\t\t\t\t   P FOR POWER \n\t\t\t ";
            cout<<"\n\n\t\t\t\t\t   F FOR FACTORIAL \n\n\t\t\t\t\t   ";
            cin>>operation;
            system("cls");
            switch(operation)
            {
            case 'A':
              cout<<"\n\n\n\n\n\t***********************************************************************************************";
              cout<<"\n\n\n\t\t\t\t ENTER FIRST NUMBER \n\t\t\t\t ";
              cin>>num1;
              cout<<"\n\n\t\t\t\t ENTER SECOND NUMBER \n\t\t\t\t ";
              cin>>num2;
    /* CALL SUM FUNCTION AND INSERT RESULT INTO STACK1*/
              push1(sum(num1, num2));
              cout<<"\n\n\n\n\t\t\t\t RESULT IS STORED \n\n\t\t\t\t ";
              for(int i=0; i<MAX; i++)
                cout<<" "<<STACK1[i];
            break;

            case 'S':
              cout<<"\n\n\n\n\n\t***********************************************************************************************";
              cout<<"\n\n\n\t\t\t\t ENTER FIRST NUMBER \n\t\t\t\t ";
              cin>>num1;
              cout<<"\n\n\t\t\t\t ENTER SECOND NUMBER \n\t\t\t\t ";
              cin>>num2;
    /* CALL DIFF FUNCTION AND INSERT RESULT INTO STACK1*/
              push1(diff(num1, num2));
              cout<<"\n\n\n\n\t\t\t\t RESULT IS STORED \n\n\t\t\t\t ";
              for(int i=0; i<MAX; i++)
                cout<<" "<<STACK1[i];
            break;

            case 'M':
              cout<<"\n\n\n\n\n\t***********************************************************************************************";
              cout<<"\n\n\n\t\t\t\t ENTER FIRST NUMBER \n\t\t\t\t ";
              cin>>num1;
              cout<<"\n\n\t\t\t\t ENTER SECOND NUMBER \n\t\t\t\t ";
              cin>>num2;
    /* CALL DIFF FUNCTION AND INSERT RESULT INTO STACK1*/
              push1(mul(num1, num2));
              cout<<"\n\n\n\n\t\t\t\t RESULT IS STORED \n\n\t\t\t\t ";
              for(int i=0; i<MAX; i++)
                cout<<" "<<STACK1[i];
            break;

            case 'D':
              cout<<"\n\n\n\n\n\t***********************************************************************************************";
              cout<<"\n\n\n\t\t\t\t ENTER FIRST NUMBER \n\t\t\t\t ";
              cin>>num1;
              cout<<"\n\n\t\t\t\t ENTER SECOND NUMBER \n\t\t\t\t ";
              cin>>num2;
    /* CALL SUM FUNCTION AND INSERT RESULT INTO STACK1*/
         //     push1(div(num1, num2));
              cout<<"\n\n\n\n\t\t\t\t RESULT IS STORED \n\n\t\t\t\t ";
              for(int i=0; i<MAX; i++)
                cout<<" "<<STACK1[i];
            break;

            case 'R':
              cout<<"\n\n\n\n\n\t***********************************************************************************************";
              cout<<"\n\n\n\t\t\t\t ENTER NUMBER \n\t\t\t\t ";
              cin>>num1;
    /* CALL sqrROOT FUNCTION AND INSERT RESULT INTO STACK1*/
              push1(sqrRoot(num1));
              cout<<"\n\n\n\n\t\t\t\t RESULT IS STORED \n\n\t\t\t\t ";
              for(int i=0; i<MAX; i++)
                cout<<" "<<STACK1[i];
            break;

            case 'P':
              cout<<"\n\n\n\n\n\t***********************************************************************************************";
              cout<<"\n\n\n\t\t\t\t ENTER BASE NUMBER \n\t\t\t\t ";
              cin>>num1;
              cout<<"\n\n\t\t\t\t ENTER ITS POWER \n\t\t\t\t ";
              cin>>num2;
    /* CALL POWER FUNCTION AND INSERT RESULT INTO STACK1*/
              push1(power(num1, num2));
              cout<<"\n\n\n\n\t\t\t\t RESULT IS STORED \n\n\t\t\t ";
              for(int i=0; i<MAX; i++)
                cout<<" "<<STACK1[i];
            break;

            case 'F':
              cout<<"\n\n\n\n\n\t***********************************************************************************************";
              cout<<"\n\n\n\t\t\t\t ENTER NUMBER \n\t\t\t\t ";
              cin>>num1;
    /* CALL FAC FUNCTION AND INSERT RESULT INTO STACK1*/
              push1(fac(num1));
              cout<<"\n\n\n\n\t\t\t\t RESULT IS STORED \n\n\t\t\t ";
              for(int i=0; i<MAX; i++)
                cout<<" "<<STACK1[i];
            break;

            default:
              cout<<"\n\n\n\n\n\t***********************************************************************************************";
              cout<<"\n\n\n\t\t\t\t INVALID OPERATION SELECTED \n\t\t\t\t ";


            }
        break;

        case 'U':
            push2(pop1());
            cout<<"\n\n\n\n\n\t***********************************************************************************************";
            cout<<"\n\n\n\t\t\t\t AFTER UNDO OPERATION \n\n\t\t\t\t ";
            for(int i=0; i<=MAX; i++)
               {
                cout<<" "<<STACK1[i];
               }

        break;

        case 'R':
            push1(pop2());
            cout<<"\n\n\n\n\n\t***********************************************************************************************";
            cout<<"\n\n\n\t\t\t\t AFTER REDO OPERATION \n\n\t\t\t\t ";

            for(int i=0; i<=MAX; i++)
               {
                cout<<" "<<STACK1[i];
               }


        break;

        default:
            cout<<"\n\n\n\n\n\t***********************************************************************************************";
            cout<<"\n\n\n\t\t\t\t INVALID OPTION SELECTED \n\t\t\t\t ";



        }

        cout<<"\n\n\n\n\n\t\t\t\t Enter Any Key To Continue and N for Exit \n\n\t\t\t\t ";
        cin>>choice;
        system("cls");
    }
        while(choice != 'N');
}
    return 0;
}
