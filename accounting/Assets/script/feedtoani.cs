using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;
using System.Threading;

public class feedtoani : MonoBehaviour {

    public Text animsg;//實時返回狀態文字
    string b;
    int a,w,c,d,e;
    public Image lifebar;
    public Text feed;
    findanimal fa;
    public GameObject panel;
    IEnumerator Feedtoani_1()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "sellani1");
        form.AddField("ani1", Savedata.animal[0]);
        form.AddField("userid", Savedata.id);
    
        WWW www = new WWW("http://163.17.135.213/accounting/Feedtoani.php", form);
        yield return www;

        b = www.text;
        if (Savedata.ani_category[0] == "1")
        {
            animsg.text = "" + b + "/20";
            lifebar.fillAmount = float.Parse(b) / 20;
            if (float.Parse(b) >= 20)
            {
             fa.ani[0].sprite = Resources.Load("chick_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[0] == "2")
        {
            animsg.text = "" + b + "/30";
            lifebar.fillAmount = float.Parse(b) / 30;
            if (float.Parse(b) >= 30)
            {
                fa.ani[0].sprite = Resources.Load("pig_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[0] == "3")
        {
            animsg.text = "" + b+"/40";
            lifebar.fillAmount = float.Parse(b) / 40;
            if (float.Parse(b) >= 40)
            {
                fa.ani[0].sprite = Resources.Load("ox_grow", typeof(Sprite)) as Sprite;
            }
        }
         


        //  Thread.Sleep(7000); //Delay 7秒
    }
    IEnumerator Feedtoani_2()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "sellani2");
        form.AddField("ani2", Savedata.animal[1]);
        form.AddField("userid", Savedata.id);

        WWW www = new WWW("http://163.17.135.213/accounting/Feedtoani.php", form);
        yield return www;

        b = www.text;
        animsg.text = "" + b;
        if (Savedata.ani_category[1] == "1")
        {
            animsg.text = "" + b + "/20";
            lifebar.fillAmount = float.Parse(b) / 20;
            if (float.Parse(b) >= 20)
            {
                fa.ani[1].sprite = Resources.Load("chick_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[1] == "2")
        {
            animsg.text = "" + b + "/30";
            lifebar.fillAmount = float.Parse(b) / 30;
            if (float.Parse(b) >= 30)
            {
                fa.ani[1].sprite = Resources.Load("pig_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[1] == "3")
        {
            animsg.text = "" + b + "/40";
            lifebar.fillAmount = float.Parse(b) / 40;
            if (float.Parse(b) >= 40)
            {
                fa.ani[1].sprite = Resources.Load("ox_grow", typeof(Sprite)) as Sprite;
            }
        }

        // Thread.Sleep(7000); //Delay 7秒
    }
    IEnumerator Feedtoani_3()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "sellani3");
        form.AddField("ani3", Savedata.animal[2]);
        form.AddField("userid", Savedata.id);

        WWW www = new WWW("http://163.17.135.213/accounting/Feedtoani.php", form);
        yield return www;

        b = www.text;
        animsg.text = "" + b;

        if (Savedata.ani_category[2] == "1")
        {
            animsg.text = "" + b + "/20";
            lifebar.fillAmount = float.Parse(b) / 20;
            if (float.Parse(b) >= 20)
            {
                fa.ani[2].sprite = Resources.Load("chick_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[2] == "2")
        {
            animsg.text = "" + b + "/30";
            lifebar.fillAmount = float.Parse(b) / 30;
            if (float.Parse(b) >= 30)
            {
                fa.ani[2].sprite = Resources.Load("pig_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[2] == "3")
        {
            animsg.text = "" + b + "/40";
            lifebar.fillAmount = float.Parse(b) / 40;
            if (float.Parse(b) >= 40)
            {
                fa.ani[2].sprite = Resources.Load("ox_grow", typeof(Sprite)) as Sprite;
            }
        }
        // Thread.Sleep(7000); //Delay 7秒
    }
    IEnumerator Feedtoani_4()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "sellani4");
        form.AddField("ani4", Savedata.animal[3]);
        form.AddField("userid", Savedata.id);

        WWW www = new WWW("http://163.17.135.213/accounting/Feedtoani.php", form);
        yield return www;

        b = www.text;
        animsg.text = "" + b;
        if (Savedata.ani_category[3] == "1")
        {
            animsg.text = "" + b + "/20";
            lifebar.fillAmount = float.Parse(b) / 20;
            if (float.Parse(b) >= 20)
            {
                fa.ani[3].sprite = Resources.Load("chick_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[3] == "2")
        {
            animsg.text = "" + b + "/30";
            lifebar.fillAmount = float.Parse(b) / 30;
            if (float.Parse(b) >= 30)
            {
                fa.ani[3].sprite = Resources.Load("pig_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[3] == "3")
        {
            animsg.text = "" + b + "/40";
            lifebar.fillAmount = float.Parse(b) / 40;
            if (float.Parse(b) >= 40)
            {
                fa.ani[3].sprite = Resources.Load("ox_grow", typeof(Sprite)) as Sprite;
            }
        }

        //  Thread.Sleep(7000); //Delay 7秒
    }
    IEnumerator Feedtoani_5()
    {
        WWWForm form = new WWWForm();//上傳unity使用者所輸入的資料
        form.AddField("action", "sellani5");
        form.AddField("ani5", Savedata.animal[4]);
        form.AddField("userid", Savedata.id);

        WWW www = new WWW("http://163.17.135.213/accounting/Feedtoani.php", form);
        yield return www;

        b = www.text;
        animsg.text = "" + b;

        if (Savedata.ani_category[4] == "1")
        {
            animsg.text = "" + b + "/20";
            lifebar.fillAmount = float.Parse(b) / 20;
            if (float.Parse(b) >= 20)
            {
                fa.ani[4].sprite = Resources.Load("chick_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[4] == "2")
        {
            animsg.text = "" + b + "/30";
            lifebar.fillAmount = float.Parse(b) / 30;
            if (float.Parse(b) >= 30)
            {
                fa.ani[4].sprite = Resources.Load("pig_grow", typeof(Sprite)) as Sprite;
            }
        }
        if (Savedata.ani_category[4] == "3")
        {
            animsg.text = "" + b + "/40";
            lifebar.fillAmount = float.Parse(b) / 40;
            if (float.Parse(b) >= 40)
            {
                fa.ani[4].sprite = Resources.Load("ox_grow", typeof(Sprite)) as Sprite;
            }
        }
        //  Thread.Sleep(7000); //Delay 7秒
    }
  
    public void feed_1() {

        if (Savedata.feed > 0) { 
        StartCoroutine(Feedtoani_1());
        a = a + 1;
        //animsg.CrossFadeAlpha(100f, 0f, false);
        //animsg.color = Color.white;
        Savedata.feed--;
        feed.text = "" + Savedata.feed;
        }
        else
        {
            panel.SetActive(true);
            return;
        }
        //if (a==5)
        //{
        //    animsg.text = "他現在吃太飽了，請過3秒後再餵食";
        //    Thread.Sleep(3000); //Delay 3秒
        //    a = 0;
        //}
    }
    public void feed_2()
    {
        if (Savedata.feed > 0)
        {
            w = w + 1;
        StartCoroutine(Feedtoani_2());
        Savedata.feed--;
        feed.text = ""+Savedata.feed;
        }
        else
        {
            panel.SetActive(true);
            return;
        }
        //animsg.CrossFadeAlpha(100f, 0f, false);
        //animsg.color = Color.yellow;
        //if (w == 5)
        //{
        //    animsg.text = "他現在吃太飽了，請過3秒後再餵食";
        //    Thread.Sleep(3000); //Delay 3秒
        //    w = 0;
        //}

    }
    public void feed_3()
    {

        if (Savedata.feed > 0)
        {
            c = c + 1;
        StartCoroutine(Feedtoani_3());
        Savedata.feed--;
        feed.text = "" + Savedata.feed;
        }
        else
        {
            panel.SetActive(true);
            return;
        }
        //animsg.CrossFadeAlpha(100f, 0f, false);
        //animsg.color = Color.yellow;
        //if (c == 5)
        //{
        //    animsg.text = "他現在吃太飽了，請過3秒後再餵食";
        //    Thread.Sleep(3000); //Delay 3秒
        //    c = 0;
        //}

    }
    public void feed_4()
    {
        if (Savedata.feed > 0)
        {
            d = d + 1;
        StartCoroutine(Feedtoani_4());
        Savedata.feed--;
        feed.text = "" + Savedata.feed;
        }
        else
        {
            panel.SetActive(true);
            return;
        }
        //animsg.CrossFadeAlpha(100f, 0f, false);
        //animsg.color = Color.yellow;
        //if (d == 5)
        //{
        //    animsg.text = "他現在吃太飽了，請過3秒後再餵食";
        //    Thread.Sleep(3000); //Delay 3秒
        //    d = 0;
        //}

    }
    public void feed_5()
    {

        if (Savedata.feed > 0)
        {
            e = e + 1;
        StartCoroutine(Feedtoani_5());
        Savedata.feed--;
        feed.text = "" + Savedata.feed;
        }
        else
        {
            panel.SetActive(true);
            return;
        }
        //animsg.CrossFadeAlpha(100f, 0f, false);
        //animsg.color = Color.yellow;
        //if (e == 5)
        //{
        //    animsg.text = "他現在吃太飽了，請過3秒後再餵食";
        //    Thread.Sleep(3000); //Delay 3秒
        //    e = 0;
        //}

    }

    // Use this for initialization
    void Start () {
   
        
    }
	
	// Update is called once per frame
	void Update () {
		
	}
}
