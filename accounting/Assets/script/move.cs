using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;


public class move : MonoBehaviour {
    float stopTime;//暂停时间
    float moveTime;//移动时间
    float vel_x, vel_y;//速度
    /// <summary>
    /// 最大、最小飞行界限
    /// </summary>
    float maxPos_x = 400;
    float maxPos_y = 500;
    float minPos_x = -400;
    float minPos_y = -500;
    float timeCounter1;//移动的计时器
    float timeCounter2;//暂停的计时器

    // Use this for initialization
    void Start () {
        Change();
    }

    // Update is called once per frame
    void Update()
    {
        timeCounter1 += Time.deltaTime;
        //如果移动的计时器小于移动时间，则进行移动，否则暂停计时器累加，当暂停计时器大于暂停时间时，重置
        if (timeCounter1 < moveTime)
        {
            transform.Translate(vel_x, vel_y, 0, Space.Self);
        }
        else
        {
            timeCounter2 += Time.deltaTime;
            if (timeCounter2 > stopTime)
            {
                Change();
                timeCounter1 = 0;
                timeCounter2 = 0;
            }
        }
        Check();
    }
    //对参数赋值
    public void OnCollisionEnter(Collision collision) {
        if (transform.localPosition.x > maxPos_x)
        {
            vel_x = -vel_x;
            transform.localPosition = new Vector3(maxPos_x, transform.localPosition.y, 0);
        }
        if (transform.localPosition.x < minPos_x)
        {
            vel_x = -vel_x;
            transform.localPosition = new Vector3(minPos_x, transform.localPosition.y, 0);
        }
        if (transform.localPosition.y > maxPos_y)
        {
            vel_y = -vel_y;
            transform.localPosition = new Vector3(transform.localPosition.x, maxPos_y, 0);
        }
        if (transform.localPosition.y < minPos_y)
        {
            vel_y = -vel_y;
            transform.localPosition = new Vector3(transform.localPosition.x, minPos_y, 0);
        }
    }
    void Change()
    {
        stopTime = Random.Range(1, 20);
        moveTime = Random.Range(1, 2);
        vel_x = Random.Range(-1, 1);
        vel_y = Random.Range(-1, 1);
    }
    //判断是否达到边界，达到边界则将速度改为负的
    void Check()
    {
        //如果到达预设的界限位置值，调换速度方向并让它当前的坐标位置等于这个临界边的位置值
        if (transform.localPosition.x > maxPos_x)
        {
            vel_x = -vel_x;
            transform.localPosition = new Vector3(maxPos_x, transform.localPosition.y, 0);
        }
        if (transform.localPosition.x < minPos_x)
        {
            vel_x = -vel_x;
            transform.localPosition = new Vector3(minPos_x, transform.localPosition.y, 0);
        }
        if (transform.localPosition.y > maxPos_y)
        {
            vel_y = -vel_y;
            transform.localPosition = new Vector3(transform.localPosition.x, maxPos_y, 0);
        }
        if (transform.localPosition.y < minPos_y)
        {
            vel_y = -vel_y;
            transform.localPosition = new Vector3(transform.localPosition.x, minPos_y, 0);
        }
    }

}
