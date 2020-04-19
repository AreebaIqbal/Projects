
//****************************************** JAVA PROJECT by 23 and 39 ***********************************************//

//**************************************** IMAGE PROCESSING *********************************************//

import java.lang.System;
import java.util.Scanner;
import java.io.*; 
import java.io.IOException; 
import java.awt.image.BufferedImage; 
import java.awt.*;
import javax.imageio.ImageIO;


class IMGP 

{  
//**************************************** GLOBAL VARIABLE DECLARATION *********************************************//

   protected String inputFilePath,outputFilePath;

   protected static int width, height,R,G,B,A,pixel,avg;
  
   
//**************************************** OBJECT *********************************************//
   
      Scanner scanner = new Scanner (System.in);
      BufferedImage img = null;

//*********************************** Method to take path *********************************************//

      void FilePath() 
        { 
             System.out.print("\n\n\t\tEnter the File path for reading i.e. C:\\Inp.jpg : ");
             
             inputFilePath = scanner.nextLine();  
             System.out.print("\n\t\tEnter the File path for saving i.e. C:\\Inp.jpg : "); 
             
             outputFilePath = scanner.nextLine(); 
          
        }

//*********************************** Gray Scale Image *********************************************//

     public BufferedImage GrayScale(BufferedImage img ) 
        {
           width = img.getWidth();
           height = img.getHeight();
         
           for(int i=0; i<height; i++) {
         
              for(int j=0; j<width; j++) {
               
            
                  pixel = img.getRGB(j,i);
                  A = (pixel>>24)&0xff; 
                  R = (pixel>>16)&0xff; 
                  G = (pixel>>8)&0xff; 
                  B = pixel&0xff; 
                  avg = (R+G+B)/3;

              // alpha should be same here

                 pixel = (A<<24) | (avg<<16) | (avg<<8) | avg;
                 img.setRGB(j, i, pixel);
             }
        }
       return img;
      }

//*********************************** Red Image *********************************************//

    public BufferedImage Red(BufferedImage img ) 
       {
          width = img.getWidth();
          height = img.getHeight();
         
            for(int i=0; i<height; i++) {
         
              for(int j=0; j<width; j++) {
               
                 pixel = img.getRGB(j,i);
                 A = (pixel>>24)&0xff; 
                 R = (pixel>>16)&0xff; 
   
              // alpha should be same here

                pixel = (A<<24) | (R<<16) | (0<<8) | 0;
                img.setRGB(j, i, pixel);
             }
          }
         return img;
       }

//*********************************** Green Image *********************************************//

    public BufferedImage Green(BufferedImage img ) 
       {
          width = img.getWidth();
          height = img.getHeight();
         
           for(int i=0; i<height; i++) {
         
              for(int j=0; j<width; j++) {
              
                pixel = img.getRGB(j,i);
                A = (pixel>>24)&0xff; 
                G = (pixel>>8)&0xff; 
              

              // alpha should be same here

               pixel = (A<<24) | (0<<16) | (G<<8) | 0;
               img.setRGB(j, i, pixel);
             }
          }
         return img;
       }

//*********************************** Blue Image *********************************************//

     public BufferedImage Blue(BufferedImage img ) 
        {
           width = img.getWidth();
           height = img.getHeight();
         
            for(int i=0; i<height; i++) {
         
               for(int j=0; j<width; j++) {
             
                 pixel = img.getRGB(j,i);
                 A = (pixel>>24)&0xff; 
                 B = pixel&0xff; 
              

              // alpha should be same here

                pixel = (A<<24) | (0<<16) | (0<<8) | B;
                img.setRGB(j, i, pixel);
             }
           }
         return img;
       }

//*********************************** Luminious Gray Scale *********************************************//


    public BufferedImage GrayLum(BufferedImage img ) 
       {
          width = img.getWidth();
          height = img.getHeight();
         
           for(int i=0; i<height; i++) {
         
             for(int j=0; j<width; j++) {
            
                pixel = img.getRGB(j,i);
                A = (pixel>>24)&0xff; 
                R = (pixel>>16)&0xff; 
                G = (pixel>>8)&0xff; 
                B = pixel&0xff; 
                avg = (int) (0.21*R + 0.72*G + 0.07*B);

                // replace RGB value with avg 

                pixel = (A<<24) | (avg<<16) | (avg<<8) | avg;
                img.setRGB(j, i, pixel); 
                 } 
               } 
         return img;
       }

//*********************************** Sepia Image *********************************************//

            
     public static BufferedImage Sepia(BufferedImage img ) 
        {
           width = img.getWidth();
           height = img.getHeight();
             for(int y = 0; y < height; y++) { 
		
                 for(int x = 0; x < width; x++) { 
				 
                    pixel = img.getRGB(x,y); 
                    A = (pixel>>24)&0xff; 
	            R = (pixel>>16)&0xff; 
                    G = (pixel>>8)&0xff; 
		    B = pixel&0xff; 

	//calculate newRed, newGreen, newBlue 
		    int newRed = (int)(0.393*R + 0.769*G + 0.189*B); 
		    int newGreen = (int)(0.349*R + 0.686*G + 0.168*B); 
		    int newBlue = (int)(0.272*R + 0.534*G + 0.131*B); 

			//check condition 
			if (newRed > 255) 
			  R = 255; 
			else
			  R = newRed; 

			if (newGreen > 255) 
			  G = 255; 
			else
			  G = newGreen; 

		        if (newBlue > 255) 
			  B = 255; 
			else
			  B = newBlue; 

		      //set new RGB value 
		    pixel = (A<<24) | (R<<16) | (G<<8) | B; 

		    img.setRGB(x, y, pixel); 
			} 
		     } 
            return img;
         }

//*********************************** Negative Image *********************************************//

     public static  BufferedImage NegativeImage(BufferedImage img ) 
        {
           width = img.getWidth();
           height = img.getHeight();
             for(int y = 0; y < height; y++) 
		{ 
		  for(int x = 0; x < width; x++) 
			{ 
			    pixel = img.getRGB(x,y); 

			    A = (pixel>>24)&0xff; 
			    R = (pixel>>16)&0xff; 
			    G = (pixel>>8)&0xff; 
			    B = pixel&0xff; 
                                 
                            R = 255-R;
                            G = 255-G;
                            B = 255-B;

                            pixel = (A<<24) | (R<<16) | (G<<8) | B; 
                            img.setRGB(x, y, pixel); 
			} 
		     } 
           return img;
          }

//*********************************** Mirror Image *********************************************//

    public static  BufferedImage MirrorImage(BufferedImage img ) 
        {
           width = img.getWidth();
           height = img.getHeight();
       
           BufferedImage   newImage= new BufferedImage(width,height, img.getType());
             for(int y = 0; y < height; y++) 
		{ 
		   for(int lx = 0, rx = width - 1; lx < width; lx++, rx--)
			{ 
				// lx starts from the left side of the image 
				// rx starts from the right side of the image 
				// lx is used since we are getting pixel from left side 
				// rx is used to set from right side 
				// get source pixel value 
			        int p = img.getRGB(lx, y); 

				// set mirror image pixel value 
				newImage.setRGB(rx, y, p); 
                               
                        }
                 }
          return newImage;

         } 

//*********************************** Rotation CW 90 Degrees *********************************************//
			 

     public static BufferedImage rotation_90clockwise( BufferedImage img )
        {
           width  = img.getWidth();
           height = img.getHeight();
           BufferedImage   newImage= new BufferedImage(height,width,img.getType() );
 
            for( int i=0 ; i < width ; i++ )
               for( int j=0 ; j < height ; j++ )
                    newImage.setRGB( height-1-j, i, img.getRGB(i,j) );
 
            return newImage;
         }

//*********************************** Rotation CW 180 Degrees *********************************************//

     public static BufferedImage rotation_180( BufferedImage img )
        {  
           img=rotation_90clockwise(img);
           img=rotation_90clockwise(img);
           return img;
        }

//*********************************** Rotation CW 270 Degrees *********************************************//

     public static BufferedImage rotation_270( BufferedImage img )
        { 
          img=rotation_180(img);
          img=rotation_90clockwise(img);
          return img;
        }

//*********************************** Rotation at any angle *********************************************//

    public static BufferedImage rotation( BufferedImage img, double angle)
       {
          width  = img.getWidth();
          height = img.getHeight();
          angle = Math.toRadians(angle);
          double sin = Math.sin(angle);
          double cos = Math.cos(angle);
          double x0 = 0.5 * (width - 1);     // point to rotate about
          double y0 = 0.5 * (height - 1);     // center of image 
          
          BufferedImage   newImage= new BufferedImage(height,width,img.getType() );
            
             for (int x = 0; x < width; x++) {
                 for (int y = 0; y < height; y++) {
                    double a = x - x0;
                    double b = y - y0;
                    int xx = (int) (+a * cos - b * sin + x0);
                    int yy = (int) (+a * sin + b * cos + y0);

                       if (xx >= 0 && xx < width && yy >= 0 && yy < height) {
 
                           newImage.setRGB( height-1-y, x, img.getRGB(x,y) );
                        }
                   }
             }
         return newImage;
       }
			 


//*********************************** Scaling/Resizing *********************************************//

      public static BufferedImage Scale( BufferedImage img , int width, int height)
       {
        BufferedImage scaledImage = new BufferedImage (width, height, img.getType());
        Graphics2D g2d = scaledImage.createGraphics();
        g2d.drawImage (img, 0, 0 , width, height, null); // image observer = null;
        g2d.dispose();
        return scaledImage;
       }


//*********************************** Translation *********************************************//

      public static BufferedImage translation( BufferedImage img, int dx, int dy)
       {
          width  = img.getWidth();
          height = img.getHeight();
          BufferedImage   newImage= new BufferedImage(width,height,img.getType() );
            
             
                 for (int y = dy; y < height; y++) {
                   for (int x = dx; x < width; x++) {
                  
                       newImage.setRGB(  x, y,img.getRGB(x,y) );
                       
                    }
                }
          return newImage;
        }
                     
         

//*********************************** Clear Screen *********************************************//  
    
     public static void cls()
      { 
        try{
            new ProcessBuilder("cmd","/c","cls").inheritIO().start().waitFor();
           } 
        catch(Exception s)
         {
           System.out.print(" Error " +s);
         }
      }

//*********************************** Title *********************************************//  

     public void Title()
     { 
       cls();
       System.out.print("\n\n\n\n\n\t\t");
       System.out.print("******************************************************");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*");
       System.out.print("\t\t   JAVA IMAGE PROCESSING\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       //System.out.print("\n\t\t*\n\t\t*\n\t\t*");
       System.out.print("\n\t\t");
       System.out.print("******************************************************");
       System.out.print("\n\n\n\n\n\t\t");         
}

//*********************************** Menu *********************************************// 
 
     public void Menu()
     {
      cls();
       System.out.print("\n\n\n\n\n\t\t");
       System.out.print("******************************************************");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\t\tMENU\t\t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\tM:\tMirror Image \t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\tN:\tNegative Image \t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\tR:\tRed Image \t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\tG:\tGreen Image \t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\tB:\tBlue Image \t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\tS:\tSepia Image \t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\tL:\tGray Luminous Image \t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\tA:\tGray Average Image \t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\tT:\tRotation  \t\t     *"); 
       System.out.print("\n\t\t*\t\t\t\t\t\t     *"); 
       System.out.print("\n\t\t*\t\tC:\tScaling \t\t     *");
       System.out.print("\n\t\t*\t\t\t\t\t\t     *");
       System.out.print("\n\t\t*\t\tD:\tTranslation  \t\t     *");
     
       System.out.print("\n\t\t******************************************************");
       
       }
 
//*********************************** Main Method *********************************************//

 public static void main(String arg[]) throws IOException
 { 
     
     IMGP imgp = new IMGP ();
     Scanner scanner = new Scanner (System.in);
     BufferedImage image;
     imgp.Title();
     
     imgp.FilePath();
    
     File f=new File(imgp.inputFilePath);
     try
     { 
      image=ImageIO.read(f);
      System.out.print("\n\t\tPress Any Key for Menu : ");  
      char n = scanner.next(".").charAt(0);  
     
     imgp.Menu();
     System.out.print("\n\n\t\tSelect from above characters : ");
     char choice = scanner.next(".").charAt(0); 
     switch(choice)
       { 
          case 'M':
          case 'm':
                   image=imgp.MirrorImage(image);
          break;
          case 'N':
          case 'n':
                   image=imgp.NegativeImage(image);
          break;
          case 'R':
          case 'r':
                   image=imgp.Red(image);
          break;
          case 'B':
          case 'b':
                   image=imgp.Blue(image);
          break;
          case 'G':
          case 'g':
                   image=imgp.Green(image);
          break;
          case 'S':
          case 's':
                   image=imgp.Sepia(image);
          break;
          case 'L':
          case 'l':
                   image=imgp.GrayLum(image);
          break;
          case 'A':
          case 'a':
                   image=imgp.GrayScale(image);
          break; 
          case 'C':
          case 'c':
                   System.out.println("\n\t\t The Current Dimension of Image: " +image.getWidth() +"x"+ image.getHeight());
                   System.out.println("\n\t\t Enter the New Dimension (width*height) i.e. 100x200: ");
                   System.out.print("\n\t\t Enter the Width: " );
                   int width =  scanner.nextInt();
                   System.out.print("\n\t\t Enter the Height: " );
                   int height=  scanner.nextInt();
                   image = imgp.Scale(image, width , height);
          break;
          case 'T':
          case 't':
                 System.out.print("\n\t\t Enter the Angle for Rotation : ");
                 double choiceOfAngle =  scanner.nextDouble();
                 
                 
                    if(choiceOfAngle==90)
                             image=imgp.rotation_90clockwise(image);
                    
                    else if(choiceOfAngle==180)                  
                             image=imgp.rotation_180(image);
                    
                    else if(choiceOfAngle==270)
                             image=imgp.rotation_270(image);
                    
                    else
                            image=imgp.rotation(image, choiceOfAngle);
                    
                   
                   break;
            case 'D':
            case 'd':
                 System.out.print("\n\t\t Enter dx for Translation : ");
                 int dx =  scanner.nextInt();
                 System.out.print("\n\t\t Enter dy for Translation : ");
                 int dy =  scanner.nextInt();
                 image= imgp.translation(image, dx, dy);
                 break;
 
          default :
                System.out.println("\n\t\t Invalid Option "); 
          break;
       }
     
     
     ImageIO.write(image, "jpg", new File(imgp.outputFilePath));
     System.out.println("\n\t\t Your Image "+imgp.inputFilePath+" is Ready! ");
     System.out.println("\n\t\t Please Check: " + imgp.outputFilePath);
     System.out.print("\n\n\n");
    }
  
   catch(IOException ioe)
    {   System.out.print("\n\n\t");
       ioe.printStackTrace();
    }
  
    catch (Exception ex)
    {  System.out.print("\n\n\t\t");
       ex.printStackTrace();
    }

 } //main method ends here
}//class imgp ends here