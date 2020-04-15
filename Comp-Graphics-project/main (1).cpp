#include <GL/gl.h>
#include <GL/glu.h>
#include <GL/glut.h>

float c=0.5;
float s_c[]={0.0,0.0,0.0,1.0,1.0,0.0,0.0,1.0,0.0};
double t,spin;
float counter=1.0,speed=0.0003;



void init_settings()
{
    glShadeModel(GL_FLAT);
    glClearColor(0.0f,0.0f,0.0f,0.0f);
}

void drawOneLine(double x1,double y1,double x2,double y2)
{  glBegin(GL_LINES);
 glVertex2f ((x1),(y1));
 glVertex2f ((x2),(y2));
 glEnd();
}
void car()
// car  //
  {

    glBegin(GL_QUADS);

    glVertex2f(0.0f, -0.1f);
    glVertex2f(0.15f,-0.1f);
	glVertex2f(0.2f, -0.2f);
	glVertex2f(-0.05f, -0.2f);
    glEnd();

    glBegin(GL_QUADS);
    glVertex2f(0.3f,-0.2f);
    glVertex2f(-0.15f,-0.2f);
	glVertex2f(-0.15f, -0.3f);
	glVertex2f(0.3f, -0.3f);
    glEnd();
    glPushMatrix();
    glTranslated(0.2,-0.35,0);
    glRotated(0,1,0,0);
    glRotated(spin,0,0,1);
    glutWireTorus(0.03,0.03,10,10);
    glPopMatrix();

    glPushMatrix();
    glTranslated(-0.05,-0.35,0);
    glRotated(0,1,0,0);
    glRotated(spin,0,0,1);
    glutWireTorus(0.03,0.03,10,10);
    glPopMatrix();
  }

    // car //

void display()
{
     t = glutGet(GLUT_ELAPSED_TIME) / 1000.0;
     spin=t*200;

    glClear(GL_COLOR_BUFFER_BIT);
    //ROAD//
    glColor3f(0.6f,0.6f,0.6f);
    glBegin(GL_QUADS);
    glVertex2f(-1.0f, -0.8f);
    glVertex2f(1.0,-0.8f);
	glVertex2f(1.0f, -0.4f);
	glVertex2f(-1.0f, -0.4f);
    glEnd();

    // ROAD PATTERN

    glColor3f(1.0f,1.0f,0.0f);
    glEnable (GL_LINE_STIPPLE);
    glLineStipple (9, 0x000F);/*  dotted  */
    glLineWidth (8.0);
    drawOneLine (-1.0, -0.6, 1.0, -0.6);
    glDisable (GL_LINE_STIPPLE);
    glLineWidth (1.0);

    // TRAFFIC SIGNAL
    glBegin(GL_QUADS);
    glColor3f(0.0f,0.5f,0.5f);
    glVertex2f(-0.8f, 0.5f);
    glVertex2f(-0.7f,0.5f);
	glVertex2f(-0.7f, -0.4f);
	glVertex2f(-0.8f, -0.4f);
    glEnd();

    glBegin(GL_QUADS);
    glVertex2f(-0.9f, 0.9f);
    glVertex2f(-0.6f,0.9f);
	glVertex2f(-0.6f, 0.45f);
	glVertex2f(-0.9f, 0.45f);
    glEnd();

    //RED LIGHT
    glPushMatrix();
    glColor3f(s_c[0],s_c[1],s_c[2]);
    glTranslated(-0.75,0.8,0.85);
    glRotated(0,0,0,1);
    glRotated(90,1,0,0);
    glutSolidSphere(0.06,16,16);
    glPopMatrix();

    //GREEN LIGHT
    glPushMatrix();
    glColor3f(s_c[3],s_c[4],s_c[5]);
    glTranslated(-0.75,0.67,0.85);
    glRotated(0,0,0,1);
    glRotated(90,1,0,0);
    glutSolidSphere(0.06,16,16);
    glPopMatrix();

    //YELLOW LIGHT
    glPushMatrix();
    glColor3f(s_c[6],s_c[7],s_c[8]);
    glTranslated(-0.75,0.54,0.85);
    glRotated(0,0,0,1);
    glRotated(90,1,0,0);
    glutSolidSphere(0.06,16,16);
    glPopMatrix();
    //TRAFFIC SIGNAL

   // Moving car//
   glPushMatrix();
      if(c>1) c=0.5;
   glLoadIdentity();
   counter=counter-speed;
   glTranslated(counter,-0.15,0.0);
   glColor3f(c,0.0,0.25);
   car();
      if (counter<=-0.8)
       {
        counter=0.9;
         c=c+0.5;
       }
    glPopMatrix();
    glutSwapBuffers();
}
void spinDisplay()
{
      s_c[0]=1;
      s_c[3]=0;
      s_c[4]=0;
      s_c[7]=0;
      spin=0;
      counter=counter;
}
static void resize(int width, int height)
{

    glViewport(0, 0, (GLsizei)width, (GLsizei) height);
    glMatrixMode(GL_PROJECTION);
    glLoadIdentity();

    glMatrixMode(GL_MODELVIEW);
    glLoadIdentity() ;
}

void mouse(int button, int state, int x, int y)
{
       switch (button) {
          case GLUT_LEFT_BUTTON:
             if (state == GLUT_DOWN)
             {
				glutIdleFunc(spinDisplay);
                glutPostRedisplay();
            }
             break;
         case GLUT_RIGHT_BUTTON:
               if (state == GLUT_DOWN)
               {   s_c[0]--;
                   s_c[3]++;
                   s_c[4]++;
                   s_c[7]++;
		           glutIdleFunc(display);
		            break;
		           }

        default:
               break;
       }
}
void keyb(unsigned char key, int x, int y)
{
    switch(key)
    {
       case 'f':
           speed=0.003;
           glutIdleFunc(display);
           break;
       case 's':
           speed=0.0002;
           glutIdleFunc(display);
           break;
       default:
           break;
    }
}

int main(int argc, char *argv[])
{
    glutInit(&argc,argv);
    glutInitDisplayMode(GLUT_RGB|GLUT_DOUBLE);
    glutInitWindowPosition(200,100);
    glutInitWindowSize(700,700);
    glutCreateWindow("Primitive Shape 6");
    init_settings();
    glutReshapeFunc(resize);
    glutDisplayFunc(display);
    glutMouseFunc(mouse);
    glutKeyboardFunc(keyb);
    glutIdleFunc(display);
    glutMainLoop();
}




