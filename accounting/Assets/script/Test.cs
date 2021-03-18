using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;
public class Test : MonoBehaviour {
    public Text text;
	// Use this for initialization
	void Start () {
        text.text = Savedata.email;
    }
	
	// Update is called once per frame
	void Update () {
       
    }
    public void ChangeColor(string email)
    {
        Savedata.email = email;
        text.text = Savedata.email;
        StartCoroutine(FindID(Savedata.email));
    }

    public void login()
    {
        // 获取unity的Java类,只能调用静态方法，获取静态属性
        AndroidJavaClass jc = new AndroidJavaClass("com.unity3d.player.UnityPlayer");
        // 获取当前的Activity对象,能调用公开方法和公开属性
        AndroidJavaObject jo = jc.GetStatic<AndroidJavaObject>("currentActivity");
        if (Savedata.email == "")
        {
            jo.Call("GetLogin", "Hello!");
            StartCoroutine(FindID(Savedata.email));
        }
        else
        {
            jo.Call("member", Savedata.email);

          
        }
    }
    public void login2()
    {
        

    }
    public void member()
    {
        // 获取unity的Java类,只能调用静态方法，获取静态属性
        AndroidJavaClass jc = new AndroidJavaClass("com.unity3d.player.UnityPlayer");
        // 获取当前的Activity对象,能调用公开方法和公开属性
        AndroidJavaObject jo = jc.GetStatic<AndroidJavaObject>("currentActivity");
       
        if (Savedata.email == "")
        {
            jo.Call("GetLogin", "Hello!");
            StartCoroutine(FindID(Savedata.email));
        }
        else
        {
            jo.Call("member", Savedata.email);

            //StartCoroutine(FindID(Savedata.email));
        }


    }
    public void billboard()
    {
        // 获取unity的Java类,只能调用静态方法，获取静态属性
        AndroidJavaClass jc = new AndroidJavaClass("com.unity3d.player.UnityPlayer");
        // 获取当前的Activity对象,能调用公开方法和公开属性
        AndroidJavaObject jo = jc.GetStatic<AndroidJavaObject>("currentActivity");

        if (Savedata.email == "")
        {
            jo.Call("GetLogin", "Hello!");
            StartCoroutine(FindID(Savedata.email));
        }
        else
        {
           

            jo.Call("billboard", Savedata.email);

            //StartCoroutine(FindID(Savedata.email));
        }


    }
    public void farm()
    {
        // 获取unity的Java类,只能调用静态方法，获取静态属性
        AndroidJavaClass jc = new AndroidJavaClass("com.unity3d.player.UnityPlayer");
        // 获取当前的Activity对象,能调用公开方法和公开属性
        AndroidJavaObject jo = jc.GetStatic<AndroidJavaObject>("currentActivity");

        if (Savedata.email == "")
        {
            jo.Call("GetLogin", "Hello!");
            StartCoroutine(FindID(Savedata.email));
        }
        else
        {
            StartCoroutine(FindID(Savedata.email));
            SceneManager.LoadScene("farm");
        }


    }
    public void Accounting()
    {
        // 获取unity的Java类,只能调用静态方法，获取静态属性
        AndroidJavaClass jc = new AndroidJavaClass("com.unity3d.player.UnityPlayer");
        // 获取当前的Activity对象,能调用公开方法和公开属性
        AndroidJavaObject jo = jc.GetStatic<AndroidJavaObject>("currentActivity");

        if (Savedata.email == "")
        {
            jo.Call("GetLogin", "Hello!");
            StartCoroutine(FindID(Savedata.email));
        }
        else
        {


            jo.Call("GetAccounting", Savedata.email);

            //StartCoroutine(FindID(Savedata.email));
        }
      


    }
    IEnumerator FindID(string username)
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("userid",Savedata.email);
      

        WWW www = new WWW("http://163.17.135.213/accounting/findid.php", form);//下載connection.php所回傳的資訊

        yield return www;

        string b = www.text;
        b = b.Replace(" ", "");
        b = b.Replace("\r", "");
        b = b.Replace("\n", "");
        b = b.Replace("\t", "");
        b = b.Replace("</br>", "");
        Savedata.id = b;

    }

}
